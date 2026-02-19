@extends('admin.layout')

@section('title', 'الشركاء | لوحة الإدارة')
@section('page-title', 'الشركاء')

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
                <h4 class="card-title mb-0">قائمة الشركاء</h4>
                <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                    <i data-feather="plus" class="mr-50"></i>
                    إضافة شريك
                </a>
            </div>
            <div class="card-body">
                @if($partners->isEmpty())
                <p class="text-muted mb-0">لا يوجد شركاء. <a href="{{ route('admin.partners.create') }}">إضافة شريك</a></p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الصورة</th>
                                <th style="width: 180px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                            <tr>
                                <td>{{ $partner->id }}</td>
                                <td>{{ $partner->name }}</td>
                                <td>
                                    @if($partner->image)
                                    <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="rounded" style="max-height: 50px; max-width: 100px; object-fit: contain;">
                                    @else
                                    <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الشريك؟');">
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
                        عرض {{ $partners->firstItem() ?? 0 }} إلى {{ $partners->lastItem() ?? 0 }} من {{ $partners->total() }}
                    </div>
                    <div>
                        {{ $partners->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
