@section('pageclass', '')

@section('title', 'Scale Gtm')
@section('description','Scale Gtm')

@section('canonical', env('MAIL_FROM_ADDRESS') . '/page/' . $page->slug )

@extends('layout.master')

@section('content')

<main>
    <section>
        <div class="container">
            <!-- Title -->
            <h1 class="">
                {{$page->title}}
            </h1>

            <!-- Text -->
            <div class="dynamic-content">
                {!!$page->description!!}
            </div>
        </div>
    </section>
</main>



@endsection