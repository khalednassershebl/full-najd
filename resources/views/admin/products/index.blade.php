@extends('admin.layout')

@section('title', 'المنتجات | لوحة الإدارة')
@section('page-title', 'المنتجات')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="card-title mb-0">قائمة المنتجات</h4>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i data-feather="plus" class="mr-50"></i>
                    إضافة منتج
                </a>
            </div>
            <div class="card-body">
                @if(isset($categoryFilter) && $categoryFilter)
                <div class="alert alert-info alert-dismissible fade show py-1 mb-2" role="alert">
                    <span class="d-flex align-items-center">
                        <i data-feather="filter" class="mr-50" style="width: 18px; height: 18px;"></i>
                        عرض منتجات تصنيف: <strong class="mx-1">{{ $categoryFilter->name }}</strong>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary mr-1">عرض الكل</a>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if($products->isEmpty())
                <p class="text-muted mb-0">لا توجد منتجات. <a href="{{ route('admin.products.create') }}">إضافة منتج</a></p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>التصنيف</th>
                                <th>الحالة</th>
                                <th>الترتيب</th>
                                <th style="width: 180px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="font-weight-bold">{{ Str::limit($product->title, 50) }}</a>
                                </td>
                                <td>{{ $product->productCategory?->name ?? '—' }}</td>
                                <td>
                                    @if($product->is_published)
                                    <span class="badge badge-success">منشور</span>
                                    @else
                                    <span class="badge badge-secondary">مسودة</span>
                                    @endif
                                </td>
                                <td>{{ $product->sort_order }}</td>
                                <td>
                                    <a href="{{ route('front.products.index') }}#product-{{ $product->id }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="عرض">عرض</a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center mt-2">
                    <div class="text-muted small">
                        عرض {{ $products->firstItem() ?? 0 }} إلى {{ $products->lastItem() ?? 0 }} من {{ $products->total() }}
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
