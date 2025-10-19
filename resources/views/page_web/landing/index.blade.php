@extends('template_web.layout')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .testimonial-container {
            text-align: center;
            padding: 40px 20px;
            position: relative;
        }

        .testimonial-icon {
            font-size: 30px;
            color: purple;
            margin-bottom: 10px;
        }

        .testimonial-quote {
            font-style: italic;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .testimonial-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .testimonial-rating {
            color: purple;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .testimonial-name {
            font-weight: bold;
            margin: 5px 0 0;
        }

        .testimonial-location {
            font-size: 14px;
            color: #666;
        }

        autoplay: {
            delay: 4000,
                disableOnInteraction: false,
        }
    </style>
@endsection
@section('content')
    <main>
        <section class="main-screen">
            <div class="main-screen__image __js_parallax">
                <img src="{{ asset('upload/beranda/' . $beranda->gambar_utama) }}" width="1920" height="1080" alt="">
            </div>
            <div class="main-screen__container container container--size-large">
                <h1 class="main-screen__title">
                    <span>{{ $beranda->judul_utama }}</span>{{ $beranda->slogan }}
                </h1>
                <a class="main-screen__btn btn" href="">
                    <span class="btn__text">Book Now</span>
                    <span class="btn__icon">
                        <svg width="19" height="19">
                            <use xlink:href="#link-arrow"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </section>
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
        <section class="carousel-section carousel-section--separator">
            <div class="carousel-section__container container container--size-large">
                <header class="carousel-section__header row align-items-center">
                    <h2 class="carousel-section__title col-12 col-md-6" data-aos="fade-up">Our latest projects
                    </h2>
                    <div class="carousel-section__nav col-12 col-md-3 order-last order-md-0" data-aos="fade-up">
                        <button class="nav-btn nav-btn--prev" data-target=".__js_carousel-latest-projects" type="button">
                            <svg width="50" height="16">
                                <use xlink:href="#long-arrow-left"></use>
                            </svg>
                        </button>
                        <button class="nav-btn nav-btn--next" data-target=".__js_carousel-latest-projects" type="button">
                            <svg width="50" height="16">
                                <use xlink:href="#long-arrow-right"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="col-12 col-md-3 text-md-right ml-auto" data-aos="fade-up">
                        <a class="carousel-section__more arrow-link" href="projects-masonry.html">
                            <span class="arrow-link__text">View all</span>
                            <span class="arrow-link__icon">
                                <svg width="75" height="75">
                                    <use xlink:href="#link-arrow"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                </header>
                <div class="carousel-section__carousel carousel carousel--slide-auto swiper-container __js_carousel-latest-projects"
                    data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                            <span class="project-preview__image">
                                <img src="{{ asset('web') }}/img/picture/carousel/4.jpg" width="720" height="548"
                                    alt="water bottle">
                            </span>
                            <span class="project-preview__bottom">
                                <span class="project-preview__title">Water bottle</span>
                                <span class="project-preview__icon">
                                    <svg width="24" height="23">
                                        <use xlink:href="#link-arrow2"></use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                            <span class="project-preview__image">
                                <img src="{{ asset('web') }}/img/picture/carousel/5.jpg" width="334" height="255"
                                    alt="Copenhagen">
                            </span>
                            <span class="project-preview__bottom">
                                <span class="project-preview__title">Copenhagen</span>
                                <span class="project-preview__icon">
                                    <svg width="24" height="23">
                                        <use xlink:href="#link-arrow2"></use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                            <span class="project-preview__image">
                                <img src="{{ asset('web') }}/img/picture/carousel/6.jpg" width="404" height="491"
                                    alt="Kodak">
                            </span>
                            <span class="project-preview__bottom">
                                <span class="project-preview__title">Kodak</span>
                                <span class="project-preview__icon">
                                    <svg width="24" height="23">
                                        <use xlink:href="#link-arrow2"></use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                            <span class="project-preview__image">
                                <img src="{{ asset('web') }}/img/picture/carousel/7.jpg" width="433" height="321"
                                    alt="Exoape">
                            </span>
                            <span class="project-preview__bottom">
                                <span class="project-preview__title">Exoape</span>
                                <span class="project-preview__icon">
                                    <svg width="24" height="23">
                                        <use xlink:href="#link-arrow2"></use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Section -->
        <section class="about-video-section about-video-section--pt-50">
            <div class="about-video-section__container container container--size-large">

                <!-- Swiper -->
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">

                        <!-- Testimonial 1 -->
                        <div class="swiper-slide">
                            <div class="testimonial-container">
                                <div class="testimonial-icon"><i class="bx bx-heart"></i></div>
                                <p class="testimonial-quote">"I love this! It rocks!"</p>
                                <div class="testimonial-user">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" class="testimonial-avatar">
                                    <div class="testimonial-rating">★★★★★</div>
                                    <h4 class="testimonial-name">John Doe</h4>
                                    <p class="testimonial-location">21 September 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="swiper-slide">
                            <div class="testimonial-container">
                                <div class="testimonial-icon"><i class="bx bx-heart"></i></div>
                                <p class="testimonial-quote">"Amazing service, very professional!"</p>
                                <div class="testimonial-user">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" class="testimonial-avatar">
                                    <div class="testimonial-rating">★★★★★</div>
                                    <h4 class="testimonial-name">Jane Smith</h4>
                                    <p class="testimonial-location">21 September 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="swiper-slide">
                            <div class="testimonial-container">
                                <div class="testimonial-icon"><i class="bx bx-heart"></i></div>
                                <p class="testimonial-quote">"Best experience ever, highly recommend."</p>
                                <div class="testimonial-user">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" class="testimonial-avatar">
                                    <div class="testimonial-rating">★★★★★</div>
                                    <h4 class="testimonial-name">Michael Lee</h4>
                                    <p class="testimonial-location">21 September 2025</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Arrows -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
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
        <section class="main-screen">
            <div class="main-screen__image __js_parallax">
                <img src="{{ asset('upload/beranda/' . $beranda->gambar_utama) }}" width="1920" height="1080"
                    alt="">
            </div>
            <div class="main-screen__container container container--size-large">
                <h1 class="main-screen__title">
                    <span>{{ $beranda->judul_utama }}</span>{{ $beranda->slogan }}
                </h1>
                <a class="main-screen__btn btn" href="">
                    <span class="btn__text">CTA</span>
                    <span class="btn__icon">
                        <svg width="19" height="19">
                            <use xlink:href="#link-arrow"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".testimonial-swiper", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 30,
        });
    </script>
@endsection
