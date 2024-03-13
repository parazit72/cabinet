@section('pageclass', 'home')

@section('title', $page->meta_title )
@section('description', $page->meta_description)

@section('canonical', env('APP_URL'))

@extends('layout.master')

@section('content')


<section class="mextreo-hero">
    <div class="hero-slide">

        <div>
            <div class="slide-img">
                <picture>
                    <source media="(min-width:768px)" srcset="assets/img/slide/slide-1.jpg">
                    <img src="/assets/img/slide/slide-1-mobile.jpg" alt="">
                </picture>

            </div>
            <div class="slide-text">
                <div class="container">
                    <img src="/assets/img/slide/logo.svg" />
                    <p>
                        Crafting Dreams, Building Memories: Your Perfect Cabinetry Awaits!
                    </p>

                    <div>
                        <a href="#" class="btn-1 btn-primary">
                            Discover More
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="mextreo-about">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-1 order-2">
                <div class="about-bg" data-aos="fade-left" data-aos-duration="3000">
                    <img src="assets/img/about/abou-bg.jpg" alt />
                </div>
                <div class="m-about-img" data-aos="fade-up" data-aos-duration="3000">
                    <img src="assets/img/about/about.jpg" alt />
                </div>
            </div>
            <div class="col-md-6 offset-md-1 order-1">
                <div class="m-about-content">
                    <h2 class="ab-tittle">Welcome</h2>
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="1500">
                        Welcome to
                    </h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">
                        Unique Star cabinetry
                    </h2>

                    <h4 data-aos="fade-up" data-aos-duration="2000">
                        Who We Are
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        We're a team of passionate craftsmen and designers with over 10 years of experience dedicated to
                        turning your cabinetry dreams into reality. From kitchen to laundry room, vanities, closets, and
                        wall units we've got the skills and tools to make it happen.
                    </p>
                    <h4 data-aos="fade-up" data-aos-duration="2000">
                        What Sets Us Apart
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        At unique star cabinetry, it's not just about wood and nails, it's about bringing your vision to
                        life. Our attention to detail, love for quality materials, and commitment to craftsmanship make
                        us stand out. Each piece we create tells a unique story, and we take pride in being a part of
                        your home's journey.
                    </p>
                    <h4 data-aos="fade-up" data-aos-duration="2000">
                        Our Process
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        From the initial sketch to the final polish, we're with you every step of the way. We listen to
                        your ideas, our designers sketch out a plan, and then we bring it to life in our workshop. Your
                        satisfaction is our top priority.
                    </p>
                    <h4 data-aos="fade-up" data-aos-duration="2000">
                        Your Vision, Our Mission
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        Your vision is our mission. Trust us to transform your space with our years of dedicated
                        service.
                        <br />
                        Let's turn your cabinetry dreams into reality!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="mextreo-blog">
    <div class="container">
        <div class="mex-blog-top">
            <h2 class="mb-tittle">Projects</h2>
            <h6 class="ht-tittle" data-aos="fade-up" data-aos-duration="2000">
                What we do
            </h6>
            <h2 data-aos="fade-up" data-aos-duration="3000">Projects</h2>
            <p data-aos="fade-up" data-aos-duration="3000" class="mt-5">
                Transform your space with our renovation and cabinetry service. From kitchens to bathrooms, we
                specialize in crafting customized solutions that marry functionality with style. With premium materials
                and expert craftsmanship, we deliver results that exceed expectations. Let us bring your vision to life
                with meticulous attention to detail and unparalleled dedication to quality.
            </p>
        </div>
    </div>
</section>




<section class="architect pt-4">
    <div class="container">
        <div class="row">



            <div class="col-md-7 order-md-1 order-2">
                <div class="archit-img" data-aos="fade-up" data-aos-duration="2500">
                    <img src="assets/img/about/abou-archtech.jpg" alt>
                </div>
            </div>
            <div class="col-md-5 order-md-2 order-1">
                <div class="ab-arch-content">
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="2500">interior design</h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">Cabinetry</h2>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        Elevate your space with our bespoke cabinetry service. We specialize in crafting custom
                        solutions tailored to your needs, whether it's for your kitchen, bathroom, or any other area of
                        your home. Our expert craftsmanship and attention to detail ensure that each piece is not only
                        functional but also a work of art. Let us bring sophistication and organization to your space
                        with our premium cabinetry solutions
                    </p>
                    <p class="text-right">
                        <a href="about-us.html" class="btn-1" data-aos="fade-up" data-aos-duration="3000">
                            Check the gallery
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="ab-interior-content">
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="2500">interior design</h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">Construction</h2>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        Experience transformation with our construction and renovation expertise. From start to finish,
                        we blend innovation and craftsmanship to bring your vision to life. Whether residential or
                        commercial, we exceed expectations with attention to detail and commitment to quality. Elevate
                        your space with us.
                    </p>
                    <p class="text-right">
                        <a href="about-us.html" class="btn-1" data-aos="fade-up" data-aos-duration="3000">
                            Check the gallery
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="interior-img" data-aos="fade-up" data-aos-duration="2500">
                    <img src="assets/img/about/abou-interior.jpg" alt>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="mextreo-service">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="m-s-content">
                    <h2 class="ms-tittle">Service</h2>
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="2000">
                        What we do
                    </h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">Our Service</h2>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        For each project we establish relationships with partners who
                        we know will help us create added value for your project. As
                        well as bringing together the public and private sectors, we
                        make sector-overarching links to gather knowledge and to
                        learn from each other. The way we undertake projects is based
                        on permanently
                    </p>
                    <a href="service.html" class="btn-1" data-aos="fade-up" data-aos-duration="3000">LEARN MORE</a>
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="row">
                    <div class="col-md-4 col-12" data-aos="fade-down-right" data-aos-duration="3000">
                        <div class="single-service si-1">
                            <img src="/assets/img/icon/vanities.svg" />
                            <h4>Vanities</h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="row">
                            <div class="col-md-12" data-aos="fade-down-left" data-aos-duration="3000">
                                <div class="single-service si-2">
                                    <img src="/assets/img/icon/laundry-room-cabinetry.svg" />
                                    <h4>Laundry Room Cabinetry</h4>
                                </div>
                            </div>
                            <div class="col-md-12" data-aos="fade-up-left" data-aos-duration="3000">
                                <div class="single-service">
                                    <img src="/assets/img/icon/bar.svg" />
                                    <h4>Bar</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="row">
                            <div class="col-md-12" data-aos="fade-down-left" data-aos-duration="3000">
                                <div class="single-service si-3">
                                    <img src="/assets/img/icon/kitchen-cabinetry.svg" />
                                    <h4>Kitchen Cabinetry</h4>
                                </div>
                            </div>
                            <div class="col-md-12" data-aos="fade-up-left" data-aos-duration="3000">
                                <div class="single-service">
                                    <img src="/assets/img/icon/closets.svg" />
                                    <h4>Closets</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="2000">
                <div id="c1" class="testimonial-slid1 owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-img">
                            <img src="assets/img/about/tesimonial-about.jpg" alt />
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-img">
                            <img src="assets/img/about/tesimonial-about-3.jpg" alt />
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-img">
                            <img src="assets/img/about/tesimonial-about-2.jpg" alt />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" data-aos="fade-up" data-aos-duration="2500">
                        <i class="flaticon-close client-quota"></i>
                        <div id="c2" class="testimonial-slid2 owl-carousel owl-theme">
                            <div class="item">
                                <p>
                                    “I can't say enough good things about mextreo. Listened to
                                    my design brief and was able to bring it to life exactly
                                    on point. I loved the additional creativity the brought in
                                    the extra finishing touches.
                                </p>
                                <div class="client">
                                    <h5>Susan Sharples</h5>
                                    <p>Mindtiup, Pilidun</p>
                                </div>
                            </div>
                            <div class="item">
                                <p>
                                    “I can't say enough good things about mextreo. Listened to
                                    my design brief and was able to bring it to life exactly
                                    on point. I loved the additional creativity the brought in
                                    the extra finishing touches.
                                </p>
                                <div class="client">
                                    <h5>Artisan Sharples</h5>
                                    <p>Mindtiup, Pilidun</p>
                                </div>
                            </div>
                            <div class="item">
                                <p>
                                    “I can't say enough good things about mextreo. Listened to
                                    my design brief and was able to bring it to life exactly
                                    on point. I loved the additional creativity the brought in
                                    the extra finishing touches.
                                </p>
                                <div class="client">
                                    <h5>Susan Sharples</h5>
                                    <p>Mindtiup, Pilidun</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                        <div id="c3" class="testimonial-slid3 owl-carousel owl-theme">
                            <div class="item">
                                <div class="client-slide-img3">
                                    <img src="assets/img/about/tesimonial-about2.jpg" alt />
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-slide-img3">
                                    <img src="assets/img/about/tesimonial-about2-1.jpg" alt />
                                </div>
                            </div>
                            <div class="item">
                                <div class="client-slide-img3">
                                    <img src="assets/img/about/tesimonial-about2-2.jpg" alt />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="mextreo-blog">
    <div class="container">
        <div class="mex-blog-top">
            <h2 class="mb-tittle">news</h2>
            <h6 class="ht-tittle" data-aos="fade-up" data-aos-duration="2000">
                Latest News
            </h6>
            <h2 data-aos="fade-up" data-aos-duration="3000">From Our Blog</h2>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog.jpg" alt />
                    <div class="sb-content">
                        <a href="blog.html">
                            <h3>Capturing the Essence of Home in Ultra-Modern</h3>
                        </a>
                        <p>Dec 15, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="2500">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-2.jpg" alt />
                    <div class="sb-content">
                        <a href="blog.html">
                            <h3>Renovation Architecture and Design</h3>
                        </a>
                        <p>Dec 25, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-3.jpg" alt />
                    <div class="sb-content">
                        <a href="blog.html">
                            <h3>Architechture Reclaimed Wolid for the Modern</h3>
                        </a>
                        <p>Dec 10, 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include('common.contact')

@endsection

@push('footer-libs')
@endpush