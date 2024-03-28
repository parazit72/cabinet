@section('pageclass', $page->class)

@section('title', $page->meta_title )
@section('description', $page->meta_description)
@section('canonical', env('APP_URL').'/about-us')



@extends('layout.master')


@section('content')


<section class="mextreo-hero inner mar-bot-140">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="hero-content">
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="1500">
                        About Us
                    </h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">Unique Star cabinetry
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
            <div class="col-md-6">
                <div class="hero-inner-img">
                    <img src="assets/img/hero/inner-hero.jpg" alt data-aos="fade-left" data-aos-duration="2000" />
                    <img src="assets/img/hero/inner-hero-after2.jpg" alt class="hero-inner-2" data-aos="fade-up" data-aos-duration="3000" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mextreo-about pt-res-50">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-1 order-2">
                <div class="about-bg" data-aos="fade-left" data-aos-duration="3000">
                    <img src="assets/img/about/about-history-bg.jpg" alt />
                </div>
                <div class="m-about-img" data-aos="fade-up" data-aos-duration="3000">
                    <img src="assets/img/about/about-history.jpg" alt />
                </div>
            </div>
            <div class="col-md-6 offset-md-1 order-md-2 order-1">
                <div class="m-about-content">
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="1500">
                        History
                    </h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">Our History</h2>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        Inspired by her father, a talented master craftsman, Erika has a
                        thorough understanding of timeless design, custom furniture and
                        the construction of fine hand crafted furnishings. Erika’s
                        affinity for classical forms and close attention to detail,
                        quality and functionality permeates sophisticated living
                        environments. Often her projects are new developments where the
                        clients are looking for a complete luxury experience while also
                        increasing the value of their new homes through capital
                        improvements.
                    </p>
                    <p data-aos="fade-up" data-aos-duration="3000">
                        Erika’s clients value her collaborative approach, her expertise
                        on capital improvement and her ability to translate her client’s
                        lifestyle and preferences into one of a kind tailored home.
                        Inspired by her father, a talented master craftsman, Erika has a
                        thorough understanding of timeless design, custom furniture and
                        the construction of fine hand crafted furnishings.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('common.contact')


@endsection