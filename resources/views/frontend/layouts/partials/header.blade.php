<header class="cs-site_header cs-style1 cs-sticky-header cs-white_bg">
  <div class="cs-main_header">
    <div class="container-fluid">
      <div class="cs-main_header_in">
        <div class="cs-main_header_left">
          <a class="cs-site_branding" href="/"><img src="/assets/images/logo-white.png" alt="Logo"></a>
        </div>
        <div class="cs-main_header_right">
          <div class="cs-nav_wrap">
            <div class="cs-nav_out">
              <div class="cs-nav_in">
                <div class="cs-nav">
                  <ul class="cs-nav_list">
                    <li>
                      <a href="{{ route('frontend.schedules') }}">Schedule</a>
                    </li>
                    <li>
                      <a href="{{ route('frontend.programs.index') }}">Program & Seminars</a>
                    </li>
                    <li>
                      <a href="{{ route('frontend.tutors.index') }}">Tutors</a>
                    </li>
                    <li>
                      <a href="{{ route('frontend.plusian-kits') }}">Plusian Kit</a>
                    </li>
                    <li>
                      <a href="https://merchandise.mcplus.my/" target="_blank">Merchandise</a>
                    </li>
                    <li>
                      <a href="{{ route('frontend.tutors.index') }}">Careers</a>
                    </li>
                    <li>
                      <div class="cs-header_btns_wrap d-flex" style="padding: 20px">
                        <a href="{{ route('frontend.time-table') }}" class="cs-btn cs-style2 cs-btn_sm"><span><strong><i class="far fa-calendar" style="color: gold"></i>TIME TABLE</strong></span></a>
                      </div>
                    </li>
                    <li>
                      <div class="cs-header_btns_wrap d-flex" style="padding: 20px">
                        <a href="#" class="cs-btn cs-style1"><span><strong>7 DAYS TRIAL</strong></span>
                        
                          <!-- Border animation -->
                          <span style="
                            position: absolute;
                            top: 0; left: 0; right: 0; bottom: 0;
                            border-radius: 1.6em;
                            border: 2px solid transparent;
                            animation: glowingBorder 3s infinite linear;
                          "></span>
                        </a>
                        
                        <style>
                          /* Animasi glow yang memutari border */
                          @keyframes glowingBorder {
                            0% {
                              border-color: rgba(255, 255, 255, 0);
                              box-shadow: 0 0 5px rgba(255, 255, 255, 0.5), 0 0 10px rgba(255, 255, 255, 0.4);
                            }
                            25% {
                              border-color: rgba(255, 255, 255, 0.6);
                              box-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6);
                            }
                            50% {
                              border-color: rgba(255, 255, 255, 0.9);
                              box-shadow: 0 0 25px rgba(255, 255, 255, 1), 0 0 40px rgba(255, 255, 255, 0.8);
                            }
                            75% {
                              border-color: rgba(255, 255, 255, 0.6);
                              box-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6);
                            }
                            100% {
                              border-color: rgba(255, 255, 255, 0);
                              box-shadow: 0 0 5px rgba(255, 255, 255, 0.5), 0 0 10px rgba(255, 255, 255, 0.4);
                            }
                          }
                        </style>
                        
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>