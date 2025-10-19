@extends('template_web.layout')
@section('style')
@endsection
@section('content')
<main>
    <article class="contact">
      <section class="contact-section">
        <div class="contact-section__container container container--size-large">
          <div class="row">
            <div class="contact-section__main col-12 col-md">
              <h2 class="contact-section__title" data-aos="fade-up">Contact</h2>
              <address class="contact-section__address" data-aos="fade-up">269 King Str, 05th Floor, Utral Hosue Building, Melbourne, VIC 3000, Australia.</address>
              <div class="contact-section__link" data-aos="fade-up">
                <a href="tel:+34255216021">+3 (425) 521 60 21</a>
              </div>
              <div class="contact-section__link" data-aos="fade-up">
                <a href="mailto:info@centrix.com">info@centrix.com</a>
              </div>
              <ul class="contact-section__social" data-aos="fade-up">
                <li>
                  <a href="#">Facebook</a>
                </li>
                <li>
                  <a href="#">Twitter</a>
                </li>
                <li>
                  <a href="#">Instagram</a>
                </li>
                <li>
                  <a href="#">LinkedIn</a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-md">
              <div class="discuss-project discuss-project--no-padding contact-section__aside">
                <div class="discuss-project__wrapper" data-aos="fade-up">
                  <div class="discuss-project__title" data-aos="fade-up">Contact</div>
                  <form action="#" method="post">
                    <div class="row justify-content-between gx-0">
                      <div class="discuss-project__field-wrapper col-12 col-md-6" data-aos="fade-up">
                        <label class="discuss-project__field field">
                          <input type="text" name="name">
                          <span class="field__hint">Name</span>
                        </label>
                      </div>
                      <div class="discuss-project__field-wrapper col-12 col-md-6" data-aos="fade-up">
                        <label class="discuss-project__field field">
                          <input type="email" name="email">
                          <span class="field__hint">Email</span>
                        </label>
                      </div>
                      <div class="col-12" data-aos="fade-up">
                        <label class="discuss-project__field discuss-project__field--textarea field">
                          <textarea name="message" required></textarea>
                          <span class="field__hint">Message</span>
                        </label>
                      </div>
                      <div class="discuss-project__bottom col-12">
                        <div class="discuss-project__file file-upload" data-aos="fade-up">
                          <label class="file-upload__label">
                            <input class="visually-hidden" type="file">
                            <span class="file-upload__icon">
                              <svg width="16" height="16">
                                <use xlink:href="#paper-clip"></use>
                              </svg>
                            </span>
                            <span class="file-upload__text">Attach a file</span>
                          </label>
                        </div>
                        <button class="discuss-project__send btn--theme-black btn" type="submit" data-aos="fade-up">
                          <span class="btn__text">Submit</span>
                          <span class="btn__icon">
                            <svg width="19" height="19">
                              <use xlink:href="#link-arrow"></use>
                            </svg>
                          </span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="contact-section__map" id="map" data-aos="fade-up">
          <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A351063e7db352f0133fe8dca1724bd5b8208d2a14e4ca511a12b61acfa0179d0&amp;source=constructor"></iframe>
        </div>
      </section>
    </article>
  </main>
@endsection

@section('script')
@endsection
