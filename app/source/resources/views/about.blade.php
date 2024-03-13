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
                        MEXTREO
                    </h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">About Us</h2>
                    <p data-aos="fade-up" data-aos-duration="2500">
                        Interior Design is a full service firm that specializes in high
                        end residential projects. The mission of NYC Interior Design is
                        to create in­te­ri­ors that are timeless, sophisticated and
                        functional. The company was formed in 2010 by principal Erika
                        Flugger. Trained as an Interior Designer in New York City, Erika
                        has developed a passion for design from different eras, origins,
                        cultures and styles. Her understanding of scale, proportion and
                        design leads her to create harmonious, clean and warm
                        residential environments.
                    </p>
                    <p data-aos="fade-up" data-aos-duration="3000">
                        Erika Flugger studied at the New York School of Interior Design
                        and gained her experience working at two top design firms in New
                        York City. She has designed, renovated and redesigned high end
                        residential projects throughout the city and was fortunate to
                        work on Metropolitan Home’s Showtime House, a $20 million, 8,800
                        square foot Greek Revival townhouse in New York’s Grammercy Park
                        that was transformed into a chic. She has designed, renovated
                        and redesigned high end residential projects throughout the city
                        and was fortunate to work on Me.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hero-inner-img">
                    <img src="assets/img/hero/inner-hero.jpg" alt data-aos="fade-left" data-aos-duration="2000" />
                    <img src="assets/img/hero/inner-hero-after2.jpg" alt class="hero-inner-2" data-aos="fade-up"
                        data-aos-duration="3000" />
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