@section('pageclass', 'min-w-360 overflow-x-auto content-page')

@section('title', 'Contant SnatchDigital')

@section('canonical', 'https://snatchdigital.co.uk/contact')


@extends('layout.master')


@section('content')

    @include('layout.contact')


    <div class="py-md-3 snatch_bullet_nav_trigger relative">
        <div class="gradient-3  absolute w-full h-full -z-3"></div>


        <div class="map-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 map-footer__item">
                        <img src="/images/contact/comments.svg" alt="map-arrow">
                        <h3 class="map-footer__title">
                            Support
                        </h3>
                        <p class="map-footer__description">
                            Our friendly team is here to help .
                        </p>
                        <a href="mailto:support@snatchdigital.co.uk" class="map-footer__description">
                            support@snatchdigital.co.uk
                        </a>
                    </div>
                    <div class="col-lg-4 map-footer__item">
                        <img src="/images/contact/mail.svg" alt="map-arrow">
                        <h3 class="map-footer__title">
                            Info
                        </h3>
                        <p class="map-footer__description">
                            Our friendly team is here to help .
                        </p>
                        <a href="mailto:info@snatchdigital.co.uk" class="map-footer__description">
                            info@snatchdigital.co.uk
                        </a>
                    </div>
                    <div class="col-lg-4 map-footer__item">
                        <img src="/images/contact/phone.svg" alt="map-arrow">
                        <h3 class="map-footer__title">
                            Phone
                        </h3>
                        <p class="map-footer__description">
                            Our friendly team is here to help .
                        </p>
                        <a href="tel:+442039500750" class="map-footer__description">
                            +44 (0) 203 950 0750
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="position-relative mt-md-5" animated="" data-transition="animate__fadeIn">
            <div class="my-4 col-11 text-center mx-auto ">
                <div>
                    <img src="/images/snatch-bullet-point.svg" alt="Point rhombus shape" class="nav_bullet_snatch me-2"
                        width="16" height="16" data-id="1">
                </div>
                <h1 class="map__title">

                    we’d love to hear


                    <strong class="text-secondary">from</strong>
                    you
                    <img src="/images/map-arrow.svg" alt="map-arrow" class="map__title-svg" width="16" height="16">

                </h1>
                <div class="line-bottom mt-3 mx-auto"></div>
                <p class="paragraph mb-5">
                    we have offices and teams all around the world
                </p>
            </div>
            <div class="container px-0 loc">
                <img src="/images/contact/map.svg" alt="map" />
                <div class="loc__point loc__point--london">
                    <div class="loc-tooltip loc-tooltip--down">
                        <div class="loc-tooltip__title">
                            UK
                        </div>
                        <div class="loc-tooltip__description">
                            Office 22A, 211 Kingsbury Road London NW9 8AQ
                        </div>

                    </div>
                </div>
                <div class="loc__point loc__point--us">
                    <div class="loc-tooltip ">
                        <div class="loc-tooltip__title">
                            US (temporary)
                        </div>
                        <div class="loc-tooltip__description">
                            101 Convention Center Dr #900, Las Vegas, NV 89109
                        </div>
                    </div>
                </div>
                <div class="loc__point loc__point--co">
                    <div class="loc-tooltip ">
                        <div class="loc-tooltip__title">
                            Colombia
                        </div>
                        <div class="loc-tooltip__description">
                            Cra 46 #14-13, Edificio BNF, Medellín, Colombia
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection


@push('page-after-footer')
    <div class="absolute t-0 h-full -z-1">
        <div class="container position-relative h-100">
            <div class="avg_lien h-100 min-h-200"></div>
        </div>
    </div>
@endpush
