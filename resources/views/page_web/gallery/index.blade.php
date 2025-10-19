@extends('template_web.layout')
@section('style')
@endsection
@section('content')
    <main>
        <article class="blog-grid blog-grid--masonry">
            <div class="blog-grid__container container container--size-large">
                <h1 class="heading heading--size-large blog-grid__title">Galeri</h1>
                <!-- Filter news-->
                <div class="filter blog-grid__filter">
                    <button class="filter__item filter__item--active __js_filter-btn" type="button"
                        data-filter="*">all</button>
                    <button class="filter__item __js_filter-btn" type="button" data-filter=".__js_design">design</button>
                    <button class="filter__item __js_filter-btn" type="button"
                        data-filter=".__js_marketing">marketing</button>
                    <button class="filter__item __js_filter-btn" type="button"
                        data-filter=".__js_business">business</button>
                    <button class="filter__item __js_filter-btn" type="button"
                        data-filter=".__js_photography">photography</button>
                </div>
                <ul class="blog-grid__row row g-0 __js_blog-grid">
                    <li
                        class="blog-grid__card news-card  col-12 col-md-6 col-lg-4 __js_masonry-item __js_design __js_business">
                        <div class="news-card__wrapper">
                            <div class="news-card__pic">
                                <img src="{{ asset('web') }}/img/picture/news/blog-1.jpg" width="533" height="510" alt="" />
                            </div>
                            <div class="news-card__content">
                                <div class="news-card__top">
                                    <div class="news-card__date">
                                        <span>16</span>
                                        <span>&nbsp;</span>
                                        <span>Jan</span>
                                        <span>,&nbsp;</span>
                                        <span>2020</span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Design</span>
                                    </div>
                                    <div class="news-card__title">A few words
                                        <br> about us
                                    </div>
                                </div>
                                <div class="news-card__bottom">
                                    <div class="news-card__text">We make our customers &#39; products valuable in the eyes
                                        of customers. To do this, we analyze and study people</div>
                                    <a class="arrow-link--no-scale arrow-link" href="{{ route('gallery-detail') }}">
                                        <span class="arrow-link__icon">
                                            <svg width="75" height="75">
                                                <use xlink:href="#link-arrow"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-grid__card news-card  col-12 col-md-6 col-lg-4 __js_masonry-item __js_design">
                        <div class="news-card__wrapper">
                            <div class="news-card__pic">
                                <img src="{{ asset('web') }}/img/picture/news/blog-2.jpg" width="533" height="510" alt="" />
                            </div>
                            <div class="news-card__content">
                                <div class="news-card__top">
                                    <div class="news-card__date">
                                        <span>16</span>
                                        <span>&nbsp;</span>
                                        <span>Jan</span>
                                        <span>,&nbsp;</span>
                                        <span>2020</span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Design</span>
                                    </div>
                                    <div class="news-card__title">A few words
                                        <br> about us
                                    </div>
                                </div>
                                <div class="news-card__bottom">
                                    <div class="news-card__text">We make our customers &#39; products valuable in the eyes
                                        of customers. To do this, we analyze and study people</div>
                                    <a class="arrow-link--no-scale arrow-link" href="{{ route('gallery-detail') }}">
                                        <span class="arrow-link__icon">
                                            <svg width="75" height="75">
                                                <use xlink:href="#link-arrow"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="blog-grid__card news-card news-card--vertical col-12 col-md-6 col-lg-4 __js_masonry-item __js_marketing __js_design">
                        <div class="news-card__wrapper">
                            <div class="news-card__pic">
                                <img src="{{ asset('web') }}/img/picture/news/blog-3.jpg" alt="" />
                            </div>
                            <div class="news-card__content">
                                <div class="news-card__top">
                                    <div class="news-card__date">
                                        <span>16</span>
                                        <span>&nbsp;</span>
                                        <span>Jan</span>
                                        <span>,&nbsp;</span>
                                        <span>2020</span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Design</span>
                                    </div>
                                    <div class="news-card__title">A few words
                                        <br> about us
                                    </div>
                                </div>
                                <div class="news-card__bottom">
                                    <div class="news-card__text">We make our customers &#39; products valuable in the eyes
                                        of customers. To do this, we analyze and study people</div>
                                    <a class="arrow-link--no-scale arrow-link" href="{{ route('gallery-detail') }}">
                                        <span class="arrow-link__icon">
                                            <svg width="75" height="75">
                                                <use xlink:href="#link-arrow"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="blog-grid__card news-card news-card--vertical col-12 col-md-6 col-lg-4 __js_masonry-item __js_photography __js_marketing">
                        <div class="news-card__wrapper">
                            <div class="news-card__pic">
                                <img src="{{ asset('web') }}/img/picture/news/blog-7.jpg" alt="" />
                            </div>
                            <div class="news-card__content">
                                <div class="news-card__top">
                                    <div class="news-card__date">
                                        <span>16</span>
                                        <span>&nbsp;</span>
                                        <span>Jan</span>
                                        <span>,&nbsp;</span>
                                        <span>2020</span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Design</span>
                                    </div>
                                    <div class="news-card__title">A few words
                                        <br> about us
                                    </div>
                                </div>
                                <div class="news-card__bottom">
                                    <div class="news-card__text">We make our customers &#39; products valuable in the eyes
                                        of customers. To do this, we analyze and study people</div>
                                    <a class="arrow-link--no-scale arrow-link" href="single-post.html">
                                        <span class="arrow-link__icon">
                                            <svg width="75" height="75">
                                                <use xlink:href="#link-arrow"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-grid__card news-card  col-12 col-md-6 col-lg-4 __js_masonry-item __js_marketing">
                        <div class="news-card__wrapper">
                            <div class="news-card__pic">
                                <img src="{{ asset('web') }}/img/picture/news/blog-5.jpg" width="533" height="510" alt="" />
                            </div>
                            <div class="news-card__content">
                                <div class="news-card__top">
                                    <div class="news-card__date">
                                        <span>16</span>
                                        <span>&nbsp;</span>
                                        <span>Jan</span>
                                        <span>,&nbsp;</span>
                                        <span>2020</span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Design</span>
                                    </div>
                                    <div class="news-card__title">A few words
                                        <br> about us
                                    </div>
                                </div>
                                <div class="news-card__bottom">
                                    <div class="news-card__text">We make our customers &#39; products valuable in the eyes
                                        of customers. To do this, we analyze and study people</div>
                                    <a class="arrow-link--no-scale arrow-link" href="{{ route('gallery-detail') }}">
                                        <span class="arrow-link__icon">
                                            <svg width="75" height="75">
                                                <use xlink:href="#link-arrow"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-grid__card news-card  col-12 col-md-6 col-lg-8 __js_masonry-item __js_photography">
                        <div class="news-card__wrapper">
                            <div class="news-card__pic">
                                <img src="{{ asset('web') }}/img/picture/news/blog-9.jpg" alt="" />
                            </div>
                            <div class="news-card__content">
                                <div class="news-card__top">
                                    <div class="news-card__date">
                                        <span>16</span>
                                        <span>&nbsp;</span>
                                        <span>Jan</span>
                                        <span>,&nbsp;</span>
                                        <span>2020</span>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Design</span>
                                    </div>
                                    <div class="news-card__title">A few words
                                        <br> about us
                                    </div>
                                </div>
                                <div class="news-card__bottom">
                                    <div class="news-card__text">We make our customers &#39; products valuable in the eyes
                                        of customers. To do this, we analyze and study people</div>
                                    <a class="arrow-link--no-scale arrow-link" href="{{ route('gallery-detail') }}">
                                        <span class="arrow-link__icon">
                                            <svg width="75" height="75">
                                                <use xlink:href="#link-arrow"></use>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="blog-grid__more circle-link" href="#">
                    <svg width="30" height="32">
                        <use xlink:href="#arrow-down"></use>
                    </svg>
                </a>
            </div>
        </article>
    </main>
@endsection

@section('script')
@endsection
