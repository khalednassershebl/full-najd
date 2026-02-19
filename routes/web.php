<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RelatedServicePageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\RelatedServicePage;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Serve nagd-front assets from resources
Route::get('/nagd-front/{path}', function (string $path) {
    $filePath = resource_path('nagd-front/' . $path);
    if (!File::exists($filePath) || !File::isFile($filePath)) {
        abort(404);
    }
    $mimeType = File::mimeType($filePath);
    return response()->file($filePath, ['Content-Type' => $mimeType]);
})->where('path', '.*');

// Serve admin assets from resources
Route::get('/admin-assets/{path}', function (string $path) {
    $filePath = resource_path('admin-front/' . $path);
    if (!File::exists($filePath) || !File::isFile($filePath)) {
        abort(404);
    }
    $mimeType = File::mimeType($filePath);
    return response()->file($filePath, ['Content-Type' => $mimeType]);
})->where('path', '.*');

Route::get('/', function () {
    return view('welcome', [
        'aboutUs' => AboutUs::getInstance(),
        'partners' => Partner::orderBy('created_at', 'desc')->get(),
        'services' => Service::activeOrdered()->get(),
    ]);
});

// Front pages
Route::get('/who-we-are/about', function () {
    return view('front.who-we-are.about', ['aboutUs' => AboutUs::getInstance()]);
});
Route::get('/services', function () {
    return view('front.services.services', [
        'services' => Service::activeOrdered()->with(['relatedServices', 'relatedServicePages'])->get(),
    ]);
});
Route::get('/services/services-v2', fn () => view('front.services.services-v2'));
Route::get('/services/one-service', fn () => redirect('/services'));
Route::get('/services/related/{relatedServicePage:slug}', function (RelatedServicePage $relatedServicePage) {
    if (!$relatedServicePage->is_active) {
        abort(404);
    }
    return view('front.services.related-page', compact('relatedServicePage'));
})->name('front.services.related');
Route::get('/services/{service}', function (Service $service) {
    if (!$service->is_active) {
        abort(404);
    }
    return view('front.services.one-service', compact('service'));
})->name('front.services.show');
Route::get('/products', function () {
    $products = \App\Models\Product::published()->with('productCategory')->get();
    $categories = \App\Models\ProductCategory::whereHas('products', function ($q) {
        $q->where('is_published', true);
    })->orderBy('sort_order')->orderBy('name')->get();
    return view('front.products.products', compact('products', 'categories'));
})->name('front.products.index');
Route::get('/projects', function () {
    $projects = \App\Models\Project::published()->with('projectCategory')->get();
    $categories = \App\Models\ProjectCategory::whereHas('projects', function ($q) {
        $q->where('is_published', true);
    })->orderBy('sort_order')->orderBy('name')->get();
    return view('front.projects.projects', compact('projects', 'categories'));
})->name('front.projects.index');
Route::get('/projects/{project:slug}', function (\App\Models\Project $project) {
    if (!$project->is_published) {
        abort(404);
    }
    return view('front.projects.one-project', compact('project'));
})->name('front.projects.show');
Route::get('/blogs', function () {
    return view('front.blogs.blogs', [
        'blogs' => Blog::published()->with('blogCategory')->get(),
        'categories' => Blog::publishedCategories(),
    ]);
})->name('front.blogs.index');
Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    if (!$blog->is_published) {
        abort(404);
    }
    $blog->increment('views');
    return view('front.blogs.one-blog', compact('blog'));
})->name('front.blogs.show');
Route::get('/contacts', [ContactController::class, 'show'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/parteners', function () {
    return view('front.parteners.parteners', [
        'partners' => Partner::orderBy('created_at', 'desc')->get(),
    ]);
});
Route::get('/layout', fn () => view('front.layout.layout'));

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
        Route::put('/about-us', [AboutUsController::class, 'update'])->name('about-us.update');
        Route::resource('blog-categories', BlogCategoryController::class)->names('blog-categories');
        Route::resource('blogs', BlogController::class)->names('blogs');
        Route::resource('partners', PartnerController::class)->names('partners');
        Route::resource('services', ServiceController::class)->names('services');
        Route::resource('related-service-pages', RelatedServicePageController::class)->names('related-service-pages');
        Route::resource('product-categories', ProductCategoryController::class)->names('product-categories');
        Route::resource('products', ProductController::class)->names('products');
        Route::resource('project-categories', ProjectCategoryController::class)->names('project-categories');
        Route::resource('projects', ProjectController::class)->names('projects');
        Route::get('contact-submissions', [ContactSubmissionController::class, 'index'])->name('contact-submissions.index');
        Route::get('contact-submissions/{contactSubmission}', [ContactSubmissionController::class, 'show'])->name('contact-submissions.show');
        Route::delete('contact-submissions/{contactSubmission}', [ContactSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
