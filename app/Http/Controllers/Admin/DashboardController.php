<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactSubmission;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        $servicesCount = Service::count();
        $productsCount = Product::count();
        $blogsCount = Blog::count();
        $partnersCount = Partner::count();
        $projectsCount = Project::count();
        $contactSubmissionsCount = ContactSubmission::count();

        return view('admin.dashboard', compact(
            'admin',
            'servicesCount',
            'productsCount',
            'blogsCount',
            'partnersCount',
            'projectsCount',
            'contactSubmissionsCount'
        ));
    }
}
