<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
                
                <h3>{{trans('website.footer_about')}}</h3>
                <p>
                @if(getDir() == 'rtl')
                    {{ Config::get('setting.home_about_footer_ar_settings') }}
                @else
                    {{ Config::get('setting.home_about_footer_en_settings') }}
                @endif
                </p>
                
            </div>
          </div><!-- End footer info column-->


          <div class="col-lg-3 col-md-3 footer-links" >
           <h4>{{trans('website.ImportantLinks')}}</h4>
              <ul>
                <li><a href="{{trans('website.Benha_website_link')}}">{{trans('website.Benha_website')}}</a></li>
              </ul>
          </div><!-- End footer links column-->

            <div class="col-lg-3 col-md-3 footer-links">
                <h4>{{trans('website.Map')}}</h4>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13755.049920735857!2d31.1816293!3d30.471165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfcf504d1b4fd19b3!2z2KzYp9mF2LnYqSDYqNmG2YfYpw!5e0!3m2!1sar!2seg!4v1477295444689" width="200" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          <p class="credits">&copy; <a href="https://portal.bu.edu.eg/page/Organizational_Chart/view" target="_blank"> {{trans('website.Copy_right')}} {{trans('website.e-portal')}} </a> - <a href="http://bu.edu.eg/" target="_blank"> {{trans('website.Benha_website')}}</a> - 2024 </p>
          </div>
        
      </div>
    </div>

  </footer>
  <!-- End Footer -->
