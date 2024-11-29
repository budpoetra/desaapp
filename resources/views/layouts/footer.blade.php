<footer class="no-print">
  <!-- Footer Start-->
  <div class="footer-area footer-padding fix">
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
          <div class="single-footer-caption">
            <div class="single-footer-caption">
              <!-- logo -->
              <div class="footer-logo">
                <a href="index.html"><img src="{{ asset('storage/' . $data[0]->app_logo_footer) }}" alt="" /></a>
              </div>
              <div class="footer-tittle">
                <div class="footer-pera">
                  <p>
                    {{ $data[0]->footer_text }}
                  </p>
                </div>
              </div>
              <!-- social -->
              <div class="footer-social">
                <a href="https://{{ $data[0]->footer_facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://{{ $data[0]->footer_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://{{ $data[0]->footer_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://{{ $data[0]->footer_whatsapp }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
          <div class="single-footer-caption">
            <div class="footer-tittle">
              <h4>Location</h4>
              <iframe src="https://{{ $data[0]->footer_location }}" width="100%" height="200" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom-area">
    <div class="container">
      <div class="footer-border">
        <div class="row d-flex align-items-center justify-content-between">
          <div class="col-lg-6">
            <div class="footer-copy-right">
              @if ($data[0]->footer_copyright != null)
                <p>{{ $data[0]->footer_copyright }}</p>
              @endif
              {{-- <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="ti-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
