@extends('admin.layout')

@section('title', 'عرض رسالة | لوحة الإدارة')
@section('page-title', 'عرض رسالة تواصل معنا')

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
                <h4 class="card-title mb-0">الرسالة #{{ $contactSubmission->id }}</h4>
                <div>
                    <a href="{{ route('admin.contact-submissions.index') }}" class="btn btn-outline-secondary btn-sm">رجوع للقائمة</a>
                    <form action="{{ route('admin.contact-submissions.destroy', $contactSubmission) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">حذف</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-3 text-muted">الاسم الكامل</dt>
                    <dd class="col-sm-9">{{ $contactSubmission->name }}</dd>

                    <dt class="col-sm-3 text-muted">البريد الإلكتروني</dt>
                    <dd class="col-sm-9"><a href="mailto:{{ $contactSubmission->email }}">{{ $contactSubmission->email }}</a></dd>

                    <dt class="col-sm-3 text-muted">رقم الهاتف</dt>
                    <dd class="col-sm-9" dir="ltr"><a href="tel:{{ $contactSubmission->phone }}">{{ $contactSubmission->phone }}</a></dd>

                    <dt class="col-sm-3 text-muted">الخدمة / الموضوع</dt>
                    <dd class="col-sm-9">{{ $contactSubmission->subject_label }}</dd>

                    <dt class="col-sm-3 text-muted">التاريخ</dt>
                    <dd class="col-sm-9">{{ $contactSubmission->created_at->format('Y-m-d H:i') }}</dd>

                    <dt class="col-sm-3 text-muted">الرسالة / وصف المشروع</dt>
                    <dd class="col-sm-9">{{ $contactSubmission->message ?: '—' }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
