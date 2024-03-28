@section('canonical', env('APP_URL').'/cabinets')



@extends('layout.master')


@section('content')


<section class="mextreo-hero inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="hero-content">
                    <h6 class="ht-tittle" data-aos="fade-right" data-aos-duration="1500">
                        latest Project
                    </h6>
                    <h2 data-aos="fade-up" data-aos-duration="2000">Cabinets
                        Different kinds of cabinets</h2>

                    <h4 class="mt-4" data-aos="fade-up" data-aos-duration="3000">
                        Custom Cabinets:
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="3000">
                        Cabinets designed and built to specific, individual requirements. Custom cabinets offer a
                        personalized solution, often crafted to fit unique spaces or design preferences.
                    </p>
                    <h4 class="mt-4" data-aos="fade-up" data-aos-duration="3000">
                        Semi-Custom Cabinets:
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="3000">
                        Cabinets with standard sizes but customizable features such as finishes, materials, and
                        accessories. These cabinets offer a balance between affordability and personalization.
                    </p>
                    <h4 class="mt-4" data-aos="fade-up" data-aos-duration="3000">
                        Stock Cabinets (Prefabricated)
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="3000">
                        Pre-manufactured cabinets available in standard sizes and designs, ready for immediate purchase
                        and installation. They are a cost-effective and quick option for kitchen or bathroom projects.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hero-inner-img">
                    <img src="assets/img/hero/cabinetry-hero.jpg" alt data-aos="fade-left" data-aos-duration="2000" />
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
            <h2 data-aos="fade-up" data-aos-duration="3000">KITCHEN CABINETS</h2>
            <p data-aos="fade-up" data-aos-duration="3000" class="mt-5">
                Kitchen cabinetry plays a crucial role in the functionality and aesthetics of a kitchen, offering
                storage solutions and setting the tone for the kitchen's design. Here's an overview of different types
                of kitchen cabinetry, each with unique features, benefits, and aesthetic appeals.
            </p>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class id="accordion">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseOne">SKAKER <i class="fas fa-chevron-up"></i><i
                                        class="fas fa-chevron-down"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="card-block">
                                <p>
                                    Shaker-style cabinets are super popular in kitchens today. The Shaker-style consists
                                    of five pieces of flat-panel, creating a frame with four pieces and with a single
                                    flat center panel as the fifth piece. This classic style works well in both
                                    traditional and modern kitchens. Shaker cabinets are known for their flat-panel
                                    doors with sturdy frames and practical designs.

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapsethree">INSET<i class="fas fa-chevron-up"></i><i
                                        class="fas fa-chevron-down"></i></a>
                            </h4>
                        </div>
                        <div id="collapsethree" class="panel-collapse collapse">
                            <div class="card-block">
                                <p>
                                    Inset-style cabinets have doors set inside the cabinet frame, not outside like
                                    regular cabinets. Each door is carefully measured to fit precisely, making them open
                                    and close just right. Inset cabinets have a classic look that lasts and you can
                                    personalize them with beaded or non-beaded inserts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class id="accordion2">

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapsetwo">LOUVERED<i class="fas fa-chevron-up"></i><i
                                        class="fas fa-chevron-down"></i></a>
                            </h4>
                        </div>
                        <div id="collapsetwo" class="panel-collapse collapse">
                            <div class="card-block">
                                <p>Louvered kitchen cabinets have horizontal wooden slats, giving them a distinctive
                                    style. Louvered cabinets are great for spaces that require ventilation because most
                                    louvered doors have spaces between each slat. You usually see this design on
                                    windows, furniture, and interior doors, adding a unique touch to kitchen cabinets.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapsefour">Flat-panel Slab<i class="fas fa-chevron-up"></i><i
                                        class="fas fa-chevron-down"></i></a>
                            </h4>
                        </div>
                        <div id="collapsefour" class="panel-collapse collapse">
                            <div class="card-block">
                                <p>Flat-panel or slab kitchen cabinet doors, also known as "slab" doors, are
                                    straightforward yet stylish. They have clean lines and a minimalist design without
                                    intricate details, making them perfect for both modern and contemporary kitchens.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="project-gallery">
    <div class="container">
        <h6 class="ht-tittle" data-aos="fade-up" data-aos-duration="2000">
            A glimpse of
        </h6>
        <h2 data-aos="fade-up" data-aos-duration="3000">Our latest projects</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="1500">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio1.jpg">
                        <img src="assets/img/portfolio/portfolio1.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="2500">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio2.jpg">
                        <img src="assets/img/portfolio/portfolio2.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="3000">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio3.jpg">
                        <img src="assets/img/portfolio/portfolio3.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="1500">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio4.jpg">
                        <img src="assets/img/portfolio/portfolio4.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="2500">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio5.jpg">
                        <img src="assets/img/portfolio/portfolio5.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="3000">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio6.jpg">
                        <img src="assets/img/portfolio/portfolio6.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="portfolio-img" data-aos="fade-up" data-aos-duration="2500">
                    <a data-fancybox="gallery" href="assets/img/portfolio/portfolio7.jpg">
                        <img src="assets/img/portfolio/portfolio7.jpg" alt /><i class="flaticon-add rp-icon"></i></a>
                    <!-- <div class="sp-text">
                        <h3>Introgen Abultreso</h3>
                        <p>Dedisgn, House</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mextreo-blog">
    <div class="container">
        <div class="mex-blog-top">
            <h6 class="ht-tittle" data-aos="fade-up" data-aos-duration="2000">
                Latest News
            </h6>
            <h2 data-aos="fade-up" data-aos-duration="3000">From Our Blog</h2>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog.jpg" alt />
                    <div class="sb-content">
                        <a href>
                            <h3>Capturing the Essence of Home in Ultra-Modern</h3>
                        </a>
                        <p>Dec 15, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="2000">
                <div class="single-blog">
                    <img src="assets/img/blog/single-blog-2.jpg" alt />
                    <div class="sb-content">
                        <a href>
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
                        <a href>
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