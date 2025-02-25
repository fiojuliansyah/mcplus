@extends('frontend.layouts.main')

@section('content')
    <div class="cs-height_100 cs-height_lg_70"></div>
          <!-- Container with properly centered icon box -->
          <div style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <!-- Icon in Gradient Box - now properly centered -->
            <div style="position: relative; background: linear-gradient(135deg, #179DCF, #B70092); width: 60px; height: 60px; border-radius: 20%; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(183, 0, 146, 0.6); margin-bottom: 15px; z-index: 3;">
              <div style="position: absolute; top: -2px; left: -2px; right: -2px; bottom: -2px; z-index: -1; background: linear-gradient(135deg, #179DCF, #B70092); filter: blur(8px); opacity: 0.8; border-radius: 50%;"></div>
              
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
              </svg>
            </div>
            
            <!-- Original Content Section -->
            <div class="cs-section_heading cs-style4">
              <h2 class="cs-section_title">Primary To Secondary Level</h2>
              <p class="cs-section_subtitle">MCPLUS provide quality education from Year 5 students up until Form 5 students.
                  Whether you are looking to strengthen your basics or preparing for your
              </p>
              <p class="cs-section_subtitle">SPM journey, we are there for you.
              </p>
            </div>
          </div>
        <div class="cs-height_100 cs-height_lg_70"></div>
        <section class="cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
          <div class="cs-height_30 cs-height_lg_30"></div>
          <div class="cs-height_30 cs-height_lg_30"></div>
          <div class="container">
            <div class="text-center">
              <div style="position: relative; max-width: 800px; margin: 40px auto 70px;">
                <div style="background-color: #38004D; border-radius: 15px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center; position: relative; border: 2px solid #470061;">
                  <h4 style="margin: 5px;">Click to see our <span style="color: #FEBE00">program schedule</span></h4>
                  <div style="position: absolute; bottom: -20px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 20px solid transparent; border-right: 20px solid transparent; border-top: 20px solid #38004D; filter: drop-shadow(0 4px 3px rgba(0,0,0,0.1)); z-index: 1;"></div>
                  <div style="position: absolute; bottom: -22px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 22px solid transparent; border-right: 22px solid transparent; border-top: 22px solid #470061; z-index: 0;"></div>
                </div>
              </div>
              <div class="cs-height_30 cs-height_lg_30"></div>
              <div class="row">
                @foreach ($classrooms as $classroom)  
                  <div class="col-lg-3 col-sm-6">
                    <div style="width: 80%; max-width: 180px; margin: 0 auto; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                      <div style="text-align: center; padding: 25px 10px; background: linear-gradient(to bottom, #ffffff, #a9a9a9); border-radius: 10px;">
                        <h4 style="margin: 0; color: #333; font-weight: 600;">
                          <a href="#classroom-{{ $classroom->id }}" 
                            onclick="scrollToClassroom('classroom-{{ $classroom->id }}')"
                            style="text-decoration: none; color: inherit; display: block;">
                            {{ $classroom->name }}
                          </a>
                        </h4>
                      </div>
                    </div>
                    <div style="height: 30px;"></div>
                  </div>
                @endforeach
              </div> 
            </div>
          </div>
        </section>

        <div class="cs-height_100 cs-height_lg_70"></div>
        <div class="cs-height_100 cs-height_lg_70"></div>

        <!-- Jika Tidak Ada Hasil -->
        <div class="container">
            @if ($classrooms->isEmpty())
                <p class="text-center">No classrooms found.</p>
            @else
                @foreach ($classrooms as $classroom)
                <div id="classroom-{{ $classroom->id }}" class="row" style="padding-bottom: 30px">
                  <div class="col" style="text-align: center;">
                    <h3 style="color: #FEBE00">{{ $classroom->name }}</h3>
                    <span style="display: block; line-height: 1; padding-bottom: 20px;">
                      <h5 style="display: inline; margin: 0;">"2025 Class Schedule"</h5>
                      <br>
                      <br>
                      <h6 style="display: inline; margin: 0;">#EducationMustWin</h6>
                      <br>
                      <br>
                      <a href="" class="cs-btn cs-style1">Download</a>
                    </span>
                  </div>
                  <div class="col" style="position: relative; overflow: hidden;">
                    <div style="display: flex; overflow-x: auto; scroll-behavior: smooth; -webkit-overflow-scrolling: touch; gap: 15px; padding: 10px 0;">
                      @if ($classroom->promos->isEmpty())
                          <p class="text-center">No promos found.</p>
                      @else
                          <!-- Promo Section with Scroll and Navigation Buttons -->
                          <div class="col" style="position: relative; overflow: hidden; padding: 0 40px;">
                            <!-- Container for scrollable content -->
                            <div class="promo-scroll-container" style="display: flex; overflow-x: auto; scroll-behavior: smooth; -webkit-overflow-scrolling: touch; gap: 15px; padding: 10px 0; scrollbar-width: none; -ms-overflow-style: none;">
                              <!-- Hide scrollbar for Chrome, Safari and Opera -->
                              <style>
                                .promo-scroll-container::-webkit-scrollbar {
                                  display: none;
                                }
                              </style>
                              
                              @foreach ($classroom->promos as $promo)    
                                <div style="min-width: 130px; background-color: #080326; border-radius: 15px; padding: 12px 15px; transition: transform 0.3s ease; border: 1px solid #B70092; box-shadow: 0 4px 8px rgba(0,0,0,0.2); transform: scale(1); transition: transform 0.3s ease;">
                                  <div style="text-align: center; width: 100%;">
                                    <span style="display: inline-block; background-color: #B70092; color: #FFF; font-weight: bold; font-size: 12px; padding: 3px 8px; border-radius: 12px; margin-bottom: 4px;">{{ $promo->name }}</span>
                                  </div>
                                  <p style="color: #FFF; font-size: 14px; text-decoration: line-through; margin: 2px 0; text-align: center; line-height: 1;">RM{{ $promo->normal_price }}</p>
                                  <div style="display: flex; align-items: baseline; justify-content: center; margin-top: 0;">
                                    <span style="font-size: 12px; color: #FEBE00; font-weight: bold; line-height: 1;">RM</span>
                                    <span style="font-size: 23px; color: #FEBE00; font-weight: bold; margin: 0 2px; line-height: 1;">{{ $promo->discount_price }}</span>
                                  </div>
                                </div>
                              @endforeach
                            </div>

                            <!-- Left Navigation Arrow -->
                            <button class="scroll-btn prev-btn" style="position: absolute; top: 50%; left: 5px; transform: translateY(-50%); width: 30px; height: 30px; border-radius: 50%; background-color: #B70092; color: white; border: none; display: flex; justify-content: center; align-items: center; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.2); font-weight: bold; font-size: 18px;">
                              &lt;
                            </button>
                            
                            <!-- Right Navigation Arrow -->
                            <button class="scroll-btn next-btn" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%); width: 30px; height: 30px; border-radius: 50%; background-color: #B70092; color: white; border: none; display: flex; justify-content: center; align-items: center; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.2); font-weight: bold; font-size: 18px;">
                              &gt;
                            </button>

                            <!-- Indicator Dots -->
                            <div style="display: flex; justify-content: center; gap: 5px; margin-top: 15px;">
                              <span class="indicator active" style="height: 8px; width: 8px; background-color: #B70092; border-radius: 50%; display: inline-block;"></span>
                              <span class="indicator" style="height: 8px; width: 8px; background-color: #ddd; border-radius: 50%; display: inline-block;"></span>
                              <span class="indicator" style="height: 8px; width: 8px; background-color: #ddd; border-radius: 50%; display: inline-block;"></span>
                              <span class="indicator" style="height: 8px; width: 8px; background-color: #ddd; border-radius: 50%; display: inline-block;"></span>
                            </div>
                          </div>
                      @endif
                      
                    </div>
                  </div>
                </div>
                    @php
                        $timetablesByDay = $classroom->timetables->groupBy('day');
                    @endphp

                    @foreach ($timetablesByDay as $day => $timetables)
                        @if ($timetables->isEmpty())
                            <p>No time tables available for {{ $day }}.</p>
                        @else
                            <table class="table table-bordered" style="border-color: #080326; border-collapse: collapse; width: 100%; border-radius: 10px; overflow: hidden;
                              border-collapse: collapse; width: 100%; border-radius: 10px; overflow: hidden;">
                              <thead style="background-color: #FEBE00; text-align: center;">
                                <tr>
                                  <th colspan="3" style="color: #262624; text-align: center;"><strong>{{ strtoupper($day) }}</strong></th>
                                </tr>
                              </thead>
                                <thead style="background-color: #262624; text-align: center;">
                                    <tr>
                                        <th style="color: white; text-align: center;">Time</th>
                                        <th style="color: white; text-align: center;">Subject | Group</th>
                                        <th style="color: white; text-align: center;">Tutor</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white; text-align: center;">
                                    @foreach ($timetables as $index => $timeTable)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($timeTable->start)->format('H:i') }} - {{ \Carbon\Carbon::parse($timeTable->end)->format('H:i') }}</td>
                                            <td>{{ strtoupper($timeTable->category->name ?? '') }} ({{ $timeTable->group }})</td>
                                            <td>{{ $timeTable->tutor->name ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>          
                @endforeach
            @endif

        </div>
    <div class="cs-height_70 cs-height_lg_40"></div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Get elements
        const scrollContainer = document.querySelector('.promo-scroll-container');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const indicators = document.querySelectorAll('.indicator');
        const promoItems = scrollContainer.querySelectorAll('div[style*="min-width"]');
        
        // Calculate scroll amount
        const scrollAmount = 150; // Adjust based on your card width + gap
        let currentIndex = 0;
        
        // Hide left button initially if at start
        prevBtn.style.display = 'none';
        
        // Update indicator dots
        function updateIndicators() {
          indicators.forEach((indicator, index) => {
            if(index === currentIndex) {
              indicator.style.backgroundColor = '#B70092';
            } else {
              indicator.style.backgroundColor = '#ddd';
            }
          });
        }
        
        // Scroll left
        prevBtn.addEventListener('click', function() {
          scrollContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
          if(currentIndex > 0) {
            currentIndex--;
            updateIndicators();
          }
          
          // Check if we need to hide the prev button
          setTimeout(() => {
            if(scrollContainer.scrollLeft <= 10) {
              prevBtn.style.display = 'none';
            }
            nextBtn.style.display = 'flex';
          }, 300);
        });
        
        // Scroll right
        nextBtn.addEventListener('click', function() {
          scrollContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
          if(currentIndex < indicators.length - 1) {
            currentIndex++;
            updateIndicators();
          }
          
          // Check if we need to hide the next button
          setTimeout(() => {
            if(scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 10) {
              nextBtn.style.display = 'none';
            }
            prevBtn.style.display = 'flex';
          }, 300);
        });
        
        // Add hover effect for promo cards
        promoItems.forEach(item => {
          item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
          });
          
          item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
          });
        });
        
        // Handle scroll event to update buttons visibility
        scrollContainer.addEventListener('scroll', function() {
          if(scrollContainer.scrollLeft <= 10) {
            prevBtn.style.display = 'none';
          } else {
            prevBtn.style.display = 'flex';
          }
          
          if(scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 10) {
            nextBtn.style.display = 'none';
          } else {
            nextBtn.style.display = 'flex';
          }
        });
      });
    </script>

    <script>
      function scrollToClassroom(classroomId) {
        // Prevent default anchor behavior
        event.preventDefault();
        
        // Get the element to scroll to
        const element = document.getElementById(classroomId);
        
        // Scroll to the element with smooth behavior
        if (element) {
          element.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    </script>

    <style>
      .col-lg-3 > div:first-child:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      }
      
      .col-lg-3 > div:first-child:hover > div {
        background: #FEBE00 !important;
      }
      
      .col-lg-3 > div:first-child:hover h4 {
        color: #B70092 !important;
      }
    </style>

    <!-- Simple JavaScript for scrolling functionality -->
    <script>
      function scrollToClassroom(classroomId) {
        event.preventDefault();
        const element = document.getElementById(classroomId);
        if (element) {
          element.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    </script>
@endsection
