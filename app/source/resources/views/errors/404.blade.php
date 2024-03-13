@section('title', '404 page not found')




@extends('layout.master')



@section('content')
<br>
<div class="container my-5 py-5">
    <div class="align-items-center justify-content-around row snatch_bullet_nav_trigger my-4 py-4">
        <div class="col-md-8 text-center text-lg-start">
            <span>
                Page Not found
            </span>
            <h1><strong class="text-secondary">404</strong> Error</h1>
            <p class="paragraph mb-5">
                sorry we couldn't find the page
            </p>
        </div>
    </div>
</div>
@endsection





@push('page-after-footer')
@endpush