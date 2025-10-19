@extends('template_web.layout')
@section('style')
@endsection
@section('content')
    <main>
        <article class="blog-grid blog-grid--post">
            <div class="blog-grid__first-screen">
                <div class="blog-grid__first-screen-image __js_parallax">
                    <img src="{{ asset('web') }}/img/picture/news/banner-blog-1.jpg" width="1920" height="1099" alt="">
                </div>
                <div class="blog-grid__tag">Design</div>
                <h1 class="heading heading--size-large blog-grid__title">Color cheme</h1>
            </div>
            <div class="single-post">
                <div class="container container--xsmall">
                    <div class="single-post__date" data-aos="fade-up">Admin on Jule 3, 2020</div>
                    <div class="single-post__title" data-aos="fade-up">To mark the first UK show of artist Henri Barande,
                        graphic designer Paul</div>
                    <div class="single-post__text" data-aos="fade-up">
                        <p>
                            This response is important for our ability to learn from mistakes, but it alsogives rise to
                            self-criticism, because it is part of the threat-protection system. In other words, what keeps
                            us safe can go too far, and keep us too safe. In fact it can trigger self-censoring.</p>
                        <p>
                            One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in the
                            future. The same is true as we experience the emotional sensation of stress from our first
                            instances of social rejection or ridicule. We quickly learn to fear and thus automatically
                            avoid potentially stressful situations of all kinds, including most common of all:
                        </p>
                    </div>
                </div>
              
                <div class="container container--small">
                    <div class="single-post__gallery">
                        <div class="single-post__gallery-col" data-aos="fade-up">
                            <img src="{{ asset('web') }}/img/picture/news/post/post-2.jpg" width="540" height="302" alt="">
                            <img src="{{ asset('web') }}/img/picture/news/post/post-3.jpg" width="540" height="302" alt="">
                        </div>
                        <div class="single-post__gallery-col" data-aos="fade-up">
                            <img src="{{ asset('web') }}/img/picture/news/post/post-4.jpg" width="540" height="634" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
@endsection

@section('script')
@endsection
