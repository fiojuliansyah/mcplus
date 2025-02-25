<header class="cs-site_header cs-style1 cs-sticky-header">
  <!-- Pure blur background container -->
  <div class="header-blur-background" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; backdrop-filter: blur(100px); -webkit-backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.05); z-index: -1;"></div>
  
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
                    <li class="nav-item">
                      <a href="{{ route('frontend.schedules') }}">Schedule</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('frontend.programs.index') }}">Program & Seminars</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('frontend.tutors.index') }}">Tutors</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('frontend.plusian-kits') }}">Plusian Kit</a>
                    </li>
                    <li class="nav-item">
                      <a href="https://merchandise.mcplus.my/" target="_blank">Merchandise</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('frontend.tutors.index') }}">Careers</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('frontend.time-table') }}" class="timetable-btn" style="
                        display: inline-block;
                        padding: 6px 15px; 
                        border: 2px solid #FEBE00; 
                        border-radius: 20px; 
                        color: #FEBE00; 
                        font-weight: bold; 
                        text-decoration: none;
                        transition: all 0.3s ease;
                        line-height: 1.5;
                        vertical-align: middle;
                      ">
                        <i class="far fa-calendar" style="color: #FEBE00; margin-right: 5px;"></i>TIME TABLE
                      </a>
                    </li>
                    <li class="nav-item">
                      <!-- 7 DAYS TRIAL Gradient Button with Circuit Animation -->
                      <a href="{{ route('frontend.survey') }}" class="trial-btn" style="
                        position: relative;
                        display: inline-block;
                        padding: 6px 15px;
                        background: linear-gradient(to right, #179DCF, #B70092);
                        border-radius: 20px;
                        color: white;
                        font-weight: bold;
                        text-decoration: none;
                        overflow: hidden;
                        line-height: 1.5;
                        vertical-align: middle;
                      ">
                        <span style="position: relative; z-index: 2;">7 DAYS TRIAL</span>
                        
                        <!-- Circuit light animation element -->
                        <span class="circuit-animation"></span>
                      </a>
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
  
  <style>
    /* Circuit Light Animation */
    .circuit-animation {
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0) 20%, 
        rgba(255, 255, 255, 0.8) 50%, 
        rgba(255, 255, 255, 0) 80%, 
        transparent 100%
      );
      animation: circuitLight 3s infinite linear;
      z-index: 1;
    }
    
    @keyframes circuitLight {
      0% {
        left: -100%;
      }
      100% {
        left: 100%;
      }
    }
    
    /* Hover effects for buttons */
    .timetable-btn:hover {
      background-color: rgba(254, 190, 0, 0.1);
      transform: translateY(-3px);
      box-shadow: 0 4px 8px rgba(254, 190, 0, 0.3);
    }
    
    .trial-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(183, 0, 146, 0.5);
    }
    
    /* Make all nav items align properly */
    .cs-nav_list {
      display: flex;
      align-items: center;
    }
    
    .cs-nav_list .nav-item {
      display: flex;
      align-items: center;
      margin: 0 5px;
    }
    
    /* Ensure header is relatively positioned for absolute positioning of blur background */
    .cs-site_header {
      position: relative;
    }
  </style>
</header>