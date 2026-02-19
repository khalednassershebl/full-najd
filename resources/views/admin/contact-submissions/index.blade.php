@extends('admin.layout')

@section('title', 'رسائل صفحة تواصل معنا | لوحة الإدارة')
@section('page-title', 'صفحة تواصل معنا')

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
            <div class="card-header">
                <h4 class="card-title mb-0">قائمة رسائل تواصل معنا</h4>
            </div>
            <div class="card-body">
                @if($submissions->isEmpty())
                <p class="text-muted mb-0">لا توجد رسائل حتى الآن.</p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>رقم الهاتف</th>
                                <th>الخدمة/الموضوع</th>
                                <th>التاريخ</th>
                                <th style="width: 140px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $sub)
                            <tr>
                                <td>{{ $sub->id }}</td>
                                <td>{{ $sub->name }}</td>
                                <td><a href="mailto:{{ $sub->email }}">{{ $sub->email }}</a></td>
                                <td dir="ltr">{{ $sub->phone }}</td>
                                <td>{{ $sub->subject_label }}</td>
                                <td>{{ $sub->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.contact-submissions.show', $sub) }}" class="btn btn-sm btn-outline-primary">عرض</a>
                                    <form action="{{ route('admin.contact-submissions.destroy', $sub) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟');">
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
                        عرض {{ $submissions->firstItem() ?? 0 }} إلى {{ $submissions->lastItem() ?? 0 }} من {{ $submissions->total() }}
                    </div>
                    <div>
                        {{ $submissions->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
