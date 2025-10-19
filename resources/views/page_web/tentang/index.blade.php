@extends('template_web.layout')
@section('style')
@endsection
@section('content')
   <main>
      <article class="about-us">
        <div class="first-banner about-us__banner">
          <div class="first-banner__image">
            <img src="{{ asset('web') }}/img/picture/first-banner/banner-about.jpg" width="1920" height="1100" alt="" />
          </div>
          <div class="container container--size-large">
            <h1 class="first-banner__title heading heading--size-large">We create
              <br>
              <span>digital</span> products
            </h1>
          </div>
        </div>
        <section class="about-video-section about-video-section--pt-50">
            <div class="about-video-section__container container container--size-large">
                <div class="row">
                    <div class="about-video-section__main col-12 col-md">
                        <div class="about-video-section__title about-video-section__title--size-large" data-aos="fade-up">
                            Our team consists of practitioners who have 15 years of experience
                            in launching and managing projects</div>
                        <div class="row align-items-end" data-aos="fade-up">
                            <div class="col-4 col-md-5 col-xl-4">
                                <a class="about-video-section__more arrow-link" href="about-us.html">
                                    <span class="arrow-link__text">About us</span>
                                    <span class="arrow-link__icon">
                                        <svg width="75" height="75">
                                            <use xlink:href="#link-arrow"></use>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="col-8 col-md-7 col-xl-8">
                                <div class="about-video-section__text" data-aos="fade-up">We make our customers '
                                    products valuable in the eyes of customers. To do this, we analyze and study
                                    people, build long-term strategies for interacting with them, develop creative
                                    ideas and create a bright design. We use all opportunities to solve business
                                    problems.</div>
                            </div>
                        </div>
                    </div>
                    <div class="about-video-section__aside col-12 col-md order-first order-md-0" data-aos="fade-up">
                        <div class="about-video-section__video video-block">
                            <img src="{{ asset('web') }}/img/picture/common/video-poster.jpg" width="810" height="539"
                                alt="About us video">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-services">
            <div class="our-services__container container container--size-large">
                <header class="our-services__header">
                    <div class="row align-items-baseline">
                        <div class="col-12 col-md-6 col-lg-5" data-aos="fade-up">
                            <h2 class="our-services__title">Our services</h2>
                        </div>
                        <div class="col-12 col-md-auto col-xl-2 ml-auto text-md-right" data-aos="fade-up">
                            <a class="our-services__more arrow-link--white arrow-link" href="services.html">
                                <span class="arrow-link__text">View all</span>
                                <span class="arrow-link__icon">
                                    <svg width="75" height="75">
                                        <use xlink:href="#link-arrow"></use>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </header>
                <div class="our-services__accordion accordion">
                    <div class="accordion__item" data-aos="fade-up">
                        <button class="accordion__item-header" type="button">
                            <span class="row align-items-md-center">
                                <span class="accordion__item-title col-11 col-md-6">Design</span>
                                <span class="accordion__item-short col-11 col-md-5">Our intelligent digital
                                    strategy and a pragmatic and thoughtful approach to solving business calls
                                    deliver a successful framework for both you and your audience.</span>
                            </span>
                        </button>
                        <div class="accordion__item-body">
                            <div class="row">
                                <div class="accordion__item-left col-12 col-md-6">
                                    <img src="{{ asset('web') }}/img/picture/mono/accordion-large.jpg" width="810"
                                        height="530" alt="Concept">
                                </div>
                                <div class="accordion__item-right col-12 col-md-6">
                                    <img src="{{ asset('web') }}/img/picture/mono/accordion-small.jpg" width="348"
                                        height="287" alt="Concept">
                                    <div class="accordion__item-text">In the design process, they create both
                                        functional and beautiful things. The team possesses unique individuality and
                                        strong qualifications and can easily translate something so abstract and
                                        visionary into a digital experience. They always put the clients first no
                                        matter how complicated the tasks are.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item" data-aos="fade-up">
                        <button class="accordion__item-header" type="button">
                            <span class="row align-items-md-center">
                                <span class="accordion__item-title col-11 col-md-6">Development</span>
                                <span class="accordion__item-short col-11 col-md-5">We make our customers '
                                    products valuable in the eyes of customers. To do this, we analyze and study
                                    people, build long-term strategies for interacting with them, develop creative
                                    ideas and create a bright design.</span>
                            </span>
                        </button>
                        <div class="accordion__item-body">
                            <div class="row">
                                <div class="accordion__item-left col-12 col-md-6">
                                    <img src="{{ asset('web') }}/img/picture/mono/accordion-large.jpg" width="810"
                                        height="530" alt="Concept">
                                </div>
                                <div class="accordion__item-right col-12 col-md-6">
                                    <img src="{{ asset('web') }}/img/picture/mono/accordion-small.jpg" width="348"
                                        height="287" alt="Concept">
                                    <div class="accordion__item-text">In the design process, they create both
                                        functional and beautiful things. The team possesses unique individuality and
                                        strong qualifications and can easily translate something so abstract and
                                        visionary into a digital experience. They always put the clients first no
                                        matter how complicated the tasks are.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item" data-aos="fade-up">
                        <button class="accordion__item-header" type="button">
                            <span class="row align-items-md-center">
                                <span class="accordion__item-title col-11 col-md-6">Graphic</span>
                                <span class="accordion__item-short col-11 col-md-5">Our intelligent digital
                                    strategy and a pragmatic and thoughtful approach to solving business calls
                                    deliver a successful framework for both you and your audience.</span>
                            </span>
                        </button>
                        <div class="accordion__item-body">
                            <div class="row">
                                <div class="accordion__item-left col-12 col-md-6">
                                    <img src="img/picture/mono/accordion-large.jpg" width="810" height="530"
                                        alt="Concept">
                                </div>
                                <div class="accordion__item-right col-12 col-md-6">
                                    <img src="img/picture/mono/accordion-small.jpg" width="348" height="287"
                                        alt="Concept">
                                    <div class="accordion__item-text">In the design process, they create both
                                        functional and beautiful things. The team possesses unique individuality and
                                        strong qualifications and can easily translate something so abstract and
                                        visionary into a digital experience. They always put the clients first no
                                        matter how complicated the tasks are.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item" data-aos="fade-up">
                        <button class="accordion__item-header" type="button">
                            <span class="row align-items-md-center">
                                <span class="accordion__item-title col-11 col-md-6">Wordpress</span>
                                <span class="accordion__item-short col-11 col-md-5">Our intelligent digital
                                    strategy and a pragmatic and thoughtful approach to solving business calls
                                    deliver a successful framework for both you and your audience.</span>
                            </span>
                        </button>
                        <div class="accordion__item-body">
                            <div class="row">
                                <div class="accordion__item-left col-12 col-md-6">
                                    <img src="{{ asset('web') }}/img/picture/mono/accordion-large.jpg" width="810"
                                        height="530" alt="Concept">
                                </div>
                                <div class="accordion__item-right col-12 col-md-6">
                                    <img src="{{ asset('web') }}/img/picture/mono/accordion-small.jpg" width="348"
                                        height="287" alt="Concept">
                                    <div class="accordion__item-text">In the design process, they create both
                                        functional and beautiful things. The team possesses unique individuality and
                                        strong qualifications and can easily translate something so abstract and
                                        visionary into a digital experience. They always put the clients first no
                                        matter how complicated the tasks are.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('script')

@endsection
