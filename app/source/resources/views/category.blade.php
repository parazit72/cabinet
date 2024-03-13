@section('pageclass', '')

@section('title', $category->meta_title . ' - ' . config('app.name'))
@section('canonical', "https://snatchdigital.co.uk/blog/$category->slug")

@push('page-style')
    <link rel="stylesheet" href="/assets/css/blog/style.minified.css">
@endpush


@extends('layout.master')



@section('content')


    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{ $category->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item mx-2"><a href="/">Home</a></li>
                        <i class="icon-keyboard_arrow_right"></i>
                        <li class="breadcrumb-item mx-2"><a href="{{ route('blog') }}">Blog</a></li>
                        <i class="icon-keyboard_arrow_right d-none d-md-block"></i>
                        <li class="breadcrumb-item mx-2 active" aria-current="page">{{ $category->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <div class="row gy-4">
                        @foreach ($posts as $post)
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-grid rounded bordered mb-4">
                                    <div class="thumb top-rounded">
                                        <a href="{{ route('collection.details', $post->collection->slug) }}"
                                            class="category-badge position-absolute">{{ $post->collection->title }}</a>

                                        <a href="{{ route('post.details', [$post->collection->slug, $post->slug]) }}">
                                            <div class="inner">
                                                <img src="{{ $post->intro_image }}" alt="{{ $post->collection->title }}" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item">

                                                <span>
                                                    <i class="icon-keyboard_quill"></i>
                                                    {{ $post->author }}
                                                </span>

                                            </li>
                                            <li class="list-inline-item"> {{ $post->created_at->format('d F Y') }}
                                            </li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3 "><a class="post-title-2line"
                                                href="{{ route('post.details', [$post->collection->slug, $post->slug]) }}">
                                                {{ $post->title }}

                                            </a></h5>
                                        <p class="excerpt mb-0 line-height-15 post-summary-5line">
                                            {{ $post->summary }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{ $posts->links() }}


                </div>
                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        @include('en.common.widget_lastPosts', ['lastPosts' => $lastPosts])

                        @include('en.common.widget_categories', ['categories' => $categories])

                        @include('en.common.widget_newsletter')

                        @include('en.common.widget_popular', ['popularPosts' => $popularPosts])

                        @include('en.common.widget_tags', ['tags' => $tags])


                    </div>

                </div>

            </div>

        </div>
    </section>

    @include('en.common.instagram')
    @include('layout.contact')


@endsection
