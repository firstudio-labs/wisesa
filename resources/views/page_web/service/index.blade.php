@extends('template_web.layout')
@section('style')
@endsection
@section('content')
<main>
    <article class="article services">
      <div class="article__container container container--size-large">
        <div class="row">
          <header class="article__header col-12 col-lg-7 col-xl-6">
            <h1 class="article__title">Our
              <br>services
            </h1>
            <div class="article__text">In the design process, they create both functional and beautiful things. The team possesses unique</div>
          </header>
          <div class="services__item services__item--first col-12 col-sm-6 col-lg-5 col-xl-6" data-aos="">
            <a class="service-preview" href="{{ route('services-detail') }}">
              <span class="service-preview__image">
                <img src="{{ asset('web') }}/img/picture/services/1.jpg" width="810" height="783" alt="Photography &lt;br&gt;&amp; Illustration">
              </span>
              <span class="service-preview__caption">Photography
                <br>& Illustration
              </span>
            </a>
          </div>
          <div class="services__item services__item--second services__item--margin-negative col-12 col-sm-6 col-lg-4" data-aos="fade-up">
            <a class="service-preview" href="{{ route('services-detail') }}">
              <span class="service-preview__image">
                <img src="{{ asset('web') }}/img/picture/services/2.jpg" width="410" height="490" alt="Mobile &lt;br&gt;apps design">
              </span>
              <span class="service-preview__caption">Mobile
                <br>apps design
              </span>
            </a>
          </div>
          <div class="services__item services__item--third services__item--left-shift col-12 col-sm-6 col-lg-8" data-aos="fade-up">
            <a class="service-preview" href="{{ route('services-detail') }}">
              <span class="service-preview__image">
                <img src="{{ asset('web') }}/img/picture/services/3.jpg" width="616" height="496" alt="Web development">
              </span>
              <span class="service-preview__caption">Web development</span>
            </a>
          </div>
          <div class="services__item services__item--last col-12 col-sm-6 col-lg-10 offset-lg-1" data-aos="fade-up">
            <a class="service-preview" href="{{ route('services-detail') }}">
              <span class="service-preview__image">
                <img src="{{ asset('web') }}/img/picture/services/4.jpg" width="1238" height="527" alt="Marketing">
              </span>
              <span class="service-preview__caption">Marketing</span>
            </a>
          </div>
        </div>
      </div>
    </article>
  </main>
@endsection

@section('script')
@endsection
