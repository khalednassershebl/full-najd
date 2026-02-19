<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RelatedServicePage;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->orderBy('id')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $allServices = Service::orderBy('sort_order')->orderBy('id')->get();
        $relatedServicePages = RelatedServicePage::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.services.create', compact('allServices', 'relatedServicePages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'icon_svg' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        $service = Service::create($validated);

        $this->syncRelatedServices($service, $request->input('related_services', []));
        $this->syncRelatedServicePages($service, $request->input('related_service_pages', []));

        return redirect()->route('admin.services.index')
            ->with('success', 'تم إضافة الخدمة بنجاح.');
    }

    public function edit(Service $service)
    {
        $allServices = Service::where('id', '!=', $service->id)->orderBy('sort_order')->orderBy('id')->get();
        $relatedServicePages = RelatedServicePage::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.services.edit', compact('service', 'allServices', 'relatedServicePages'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'icon_svg' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        $service->update($validated);

        $this->syncRelatedServices($service, $request->input('related_services', []));
        $this->syncRelatedServicePages($service, $request->input('related_service_pages', []));

        return redirect()->route('admin.services.index')
            ->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    protected function syncRelatedServicePages(Service $service, array $pageIds): void
    {
        $sync = [];
        foreach (array_filter($pageIds) as $i => $id) {
            $sync[(int) $id] = ['sort_order' => $i];
        }
        $service->relatedServicePages()->sync($sync);
    }

    protected function syncRelatedServices(Service $service, array $relatedIds): void
    {
        $sync = [];
        foreach (array_filter($relatedIds) as $i => $id) {
            $sync[(int) $id] = ['sort_order' => $i];
        }
        $service->relatedServices()->sync($sync);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'تم حذف الخدمة بنجاح.');
    }
}
