@section('pageclass', 'blog')

@section('title', $post->meta_title)
@section('description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('canonical', env('APP_URL'). '/blog/' . '/' . $post->slug)


@extends('layout.master')

@section('content')



<main class="blog-detail">

    <div class="container blog-detail__container">

        <div class="blog-detail__image">
            <img src="{{$post->intro_image}}" alt="{{$post->title}}">
        </div>

        <h1 class="blog-detail__title">
            {{$post->title}}
        </h1>

        <p class="m-0">
            <span class="blog-detail__author">
                Written by {{$post->author}}
            </span>
            <span class="blog-detail__date">
                {{ \Carbon\Carbon::parse($post->published_at)->format('Y M d')}}

            </span>
        </p>

        <hr class="blog-detail__hr">

        <div class="blog-detail__content">
            {!! $post->description !!}
        </div>

    </div>

</main>


@include('common.contact')

@endsection