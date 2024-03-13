@extends('layout.master')


@section('pageclass', $page->class)

@section('title', $page->meta_title )
@section('description', $page->meta_description)
@section('canonical', env('APP_URL').'/services')

@if (app('request')->input('page'))
@section('canonical', env('APP_URL').'/blog?page=' . app('request')->input('page'))
@else
@section('canonical', env('APP_URL').'/blog')
@endif



@section('content')


<section class="mextreo-blog">
    <div class="container">
        <div class="mex-blog-top">
            <h6 class="ht-tittle" data-aos="fade-up" data-aos-duration="2000">Latest News</h6>
            <h2 data-aos="fade-up" data-aos-duration="3000">From Our Blog</h2>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Capturing the Essence of
                                Home in Ultra-Modern </h3>
                        </a>
                        <p>Dec 15, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="2000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-2.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Renovation Architecture
                                and Design </h3>
                        </a>
                        <p>Dec 25, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-3.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Architechture Reclaimed
                                Wolid for the Modern </h3>
                        </a>
                        <p>Dec 10, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-4.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Advice for stirring your
                                online community </h3>
                        </a>
                        <p>Dec 12, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-5.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Renovation Architecture
                                and Design </h3>
                        </a>
                        <p>Dec 08, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-6.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Apartment Renovation by
                                Flussocreativo Design </h3>
                        </a>
                        <p>Dec 05, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-7.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Romantic Apartment in
                                Rome Renovated</h3>
                        </a>
                        <p>Nov 10, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-8.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>New Renderings Reveal the
                                Penthouse Interior</h3>
                        </a>
                        <p>Nov 18, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-9.jpg" alt>
                    <div class="sb-content">
                        <a href="">
                            <h3>Create a House of Your
                                Dream: Few Tips</h3>
                        </a>
                        <p>Nov 25, 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('common.contact')
@endsection