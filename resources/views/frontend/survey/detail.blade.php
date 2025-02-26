@extends('frontend.layouts.main')

@section('content')
    <div class="cs-height_100 cs-height_lg_70"></div>
          <!-- Container with properly centered icon box -->
          <div class="non-printable" style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
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
        <div class="cs-height_100 cs-height_lg_70 non-printable"></div>
        
        <!-- Print Button - Non-printable -->
        <div class="container non-printable">
          <div class="text-right" style="margin-bottom: 20px;">
            <button onclick="printSchedule()" class="cs-btn cs-style1" style="background-color: #B70092; color: white; border: none; padding: 10px 20px; border-radius: 20px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
              </svg>
              Print Schedule
            </button>
          </div>
        </div>
        
        <!-- Active Filters Section (if any) - Non-printable -->
        @if(isset($filters) && (isset($filters['category']) || isset($filters['tutor']) || isset($filters['timetable'])))
        <div class="container non-printable">
          <div style="background-color: #38004D; border-radius: 15px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px; border: 2px solid #470061;">
            <h5 style="color: white; margin-bottom: 10px;">Active Filters:</h5>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
              @if(isset($filters['category']) && $filters['category'])
                <div style="background-color: #B70092; color: white; border-radius: 20px; padding: 5px 15px; display: flex; align-items: center;">
                  <span>Subject: {{ $filters['category'] }}</span>
                  <a href="{{ route('frontend.survey.detail', array_merge(request()->except('category'), ['classroom_id' => request('classroom_id')])) }}" style="color: white; margin-left: 10px; font-weight: bold; text-decoration: none;">×</a>
                </div>
              @endif
              
              @if(isset($filters['tutor']) && $filters['tutor'])
                <div style="background-color: #179DCF; color: white; border-radius: 20px; padding: 5px 15px; display: flex; align-items: center;">
                  <span>Tutor: {{ $filters['tutor'] }}</span>
                  <a href="{{ route('frontend.survey.detail', array_merge(request()->except('tutor'), ['classroom_id' => request('classroom_id')])) }}" style="color: white; margin-left: 10px; font-weight: bold; text-decoration: none;">×</a>
                </div>
              @endif
              
              @if(isset($filters['timetable']) && $filters['timetable'])
                <div style="background-color: #FEBE00; color: #38004D; border-radius: 20px; padding: 5px 15px; display: flex; align-items: center;">
                  <span>Schedule: {{ $filters['timetable'] }}</span>
                  <a href="{{ route('frontend.survey.detail', array_merge(request()->except('timetable'), ['classroom_id' => request('classroom_id')])) }}" style="color: #38004D; margin-left: 10px; font-weight: bold; text-decoration: none;">×</a>
                </div>
              @endif
              
              <div style="margin-left: auto;">
                <a href="{{ route('frontend.survey.detail', ['classroom_id' => request('classroom_id')]) }}" style="background-color: #262624; color: white; border-radius: 20px; padding: 5px 15px; text-decoration: none; display: inline-block;">Clear All</a>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="cs-height_100 cs-height_lg_70 non-printable"></div>

        <!-- Tampilkan Detail Kelas -->
        <div class="container printable-content" id="printable-section">
            <!-- Content for Print Only -->
            <div class="print-only-header" style="display: none; text-align: center; margin-bottom: 20px;">
              <h1 style="color: #FEBE00;">MCPLUS Class Schedule</h1>
              <p>{{ date('d F Y') }}</p>
              <hr style="border-top: 2px solid #FEBE00; margin: 20px 0;">
            </div>
            
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
                    </span>
                  </div>
                  <div class="col non-printable" style="position: relative; overflow: hidden;">
                    @if ($classroom->promos->isEmpty())
                        <p class="text-center">No promos found.</p>
                    @else
                        <!-- Promo Section with Scroll and Navigation Buttons (for screen only) -->
                        <div style="position: relative; overflow: hidden; padding: 0 40px;">
                          <!-- Container for scrollable content -->
                          <div class="promo-scroll-container-{{ $classroom->id }}" style="display: flex; overflow-x: auto; scroll-behavior: smooth; -webkit-overflow-scrolling: touch; gap: 15px; padding: 10px 0; scrollbar-width: none; -ms-overflow-style: none;">
                            <!-- Hide scrollbar for Chrome, Safari and Opera -->
                            <style>
                              .promo-scroll-container-{{ $classroom->id }}::-webkit-scrollbar {
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
                          <button class="scroll-btn prev-btn-{{ $classroom->id }}" style="position: absolute; top: 50%; left: 5px; transform: translateY(-50%); width: 30px; height: 30px; border-radius: 50%; background-color: #B70092; color: white; border: none; display: none; justify-content: center; align-items: center; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.2); font-weight: bold; font-size: 18px;">
                            &lt;
                          </button>
                          
                          <!-- Right Navigation Arrow -->
                          <button class="scroll-btn next-btn-{{ $classroom->id }}" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%); width: 30px; height: 30px; border-radius: 50%; background-color: #B70092; color: white; border: none; display: flex; justify-content: center; align-items: center; cursor: pointer; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.2); font-weight: bold; font-size: 18px;">
                            &gt;
                          </button>

                          <!-- Indicator Dots -->
                          <div class="indicators-{{ $classroom->id }}" style="display: flex; justify-content: center; gap: 5px; margin-top: 15px;">
                            <span class="indicator active" style="height: 8px; width: 8px; background-color: #B70092; border-radius: 50%; display: inline-block;"></span>
                            <span class="indicator" style="height: 8px; width: 8px; background-color: #ddd; border-radius: 50%; display: inline-block;"></span>
                            <span class="indicator" style="height: 8px; width: 8px; background-color: #ddd; border-radius: 50%; display: inline-block;"></span>
                            <span class="indicator" style="height: 8px; width: 8px; background-color: #ddd; border-radius: 50%; display: inline-block;"></span>
                          </div>
                        </div>
                    @endif
                  </div>
                </div>

                <!-- Promo Section for Print -->
                @if (!$classroom->promos->isEmpty())
                <div class="print-only" style="display: none; margin-bottom: 30px;">
                  <h4 style="color: #B70092; margin-bottom: 15px;">Available Promos</h4>
                  <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                    @foreach ($classroom->promos as $promo)
                      <div style="border: 1px solid #B70092; border-radius: 10px; padding: 15px; text-align: center; width: 150px;">
                        <div style="margin-bottom: 10px;">
                          <strong style="color: #B70092;">{{ $promo->name }}</strong>
                        </div>
                        <div style="text-decoration: line-through; margin-bottom: 5px;">RM{{ $promo->normal_price }}</div>
                        <div style="font-size: 18px; font-weight: bold; color: #B70092;">RM{{ $promo->discount_price }}</div>
                      </div>
                    @endforeach
                  </div>
                </div>
                @endif

                @if($classroom->timetables->isEmpty())
                    <div class="alert non-printable" style="background-color: #38004D; color: white; padding: 15px; border-radius: 10px; text-align: center; margin: 20px 0;">
                      <p>No schedule available with the selected filters. <a href="{{ route('frontend.survey.detail', ['classroom_id' => $classroom->id]) }}" style="color: #FEBE00; text-decoration: underline;">View all schedules</a></p>
                    </div>
                @else
                    @php
                        $timetablesByDay = $classroom->timetables->groupBy('day');
                    @endphp

                    @foreach ($timetablesByDay as $day => $timetables)
                        <table class="table table-bordered" style="border-color: #080326; border-collapse: collapse; width: 100%; border-radius: 10px; overflow: hidden;
                          border-collapse: collapse; width: 100%; border-radius: 10px; overflow: hidden; margin-bottom: 20px;">
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
                                        <td>
                                          <a href="#" class="non-printable" 
                                             style="text-decoration: none; color: {{ isset($filters['category']) && $filters['category'] == ($timeTable->category->slug ?? '') ? '#B70092' : 'inherit' }}; font-weight: {{ isset($filters['category']) && $filters['category'] == ($timeTable->category->slug ?? '') ? 'bold' : 'normal' }};">
                                            {{ strtoupper($timeTable->category->name ?? '') }}
                                          </a> 
                                          <span class="print-only" style="display: none;">{{ strtoupper($timeTable->category->name ?? '') }}</span>
                                          ({{ $timeTable->group }})
                                        </td>
                                        <td>
                                          <a href="#" class="non-printable" 
                                             style="text-decoration: none; color: {{ isset($filters['tutor']) && $filters['tutor'] == ($timeTable->tutor->slug ?? '') ? '#179DCF' : 'inherit' }}; font-weight: {{ isset($filters['tutor']) && $filters['tutor'] == ($timeTable->tutor->slug ?? '') ? 'bold' : 'normal' }};">
                                            {{ $timeTable->tutor->name ?? '' }}
                                          </a>
                                          <span class="print-only" style="display: none;">{{ $timeTable->tutor->name ?? '' }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endif
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>          
                @endforeach
            @endif
            
            <!-- Print footer -->
            <div class="print-only-footer" style="display: none; text-align: center; margin-top: 30px; font-size: 12px;">
              <p>Printed on {{ date('d F Y, H:i') }} | MCPLUS Education Center</p>
              <p>For more information, please contact us at info@mcplus.edu.my or +60 12-345 6789</p>
            </div>
        </div>
    <div class="cs-height_70 cs-height_lg_40 non-printable"></div>

    <!-- Print Styles -->
    <style>
      @media print {
        body * {
          visibility: hidden;
        }
        
        .printable-content, .printable-content * {
          visibility: visible;
        }
        
        .non-printable {
          display: none !important;
        }
        
        .print-only, .print-only-header, .print-only-footer {
          display: block !important;
        }
        
        .printable-content {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          padding: 20px;
        }
        
        table {
          page-break-inside: avoid;
          border: 1px solid #080326 !important;
        }
        
        thead {
          display: table-header-group;
        }
        
        tr, td, th {
          page-break-inside: avoid;
        }
        
        h3 {
          color: #B70092 !important;
        }
      }
      
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
      
      .active-classroom {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      }
    </style>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk menyiapkan tombol navigasi promo untuk setiap kelas
        function setupPromoNavigation(classroomId) {
          // Get elements
          const scrollContainer = document.querySelector('.promo-scroll-container-' + classroomId);
          if (!scrollContainer) return; // Skip if container doesn't exist
          
          const prevBtn = document.querySelector('.prev-btn-' + classroomId);
          const nextBtn = document.querySelector('.next-btn-' + classroomId);
          const indicators = document.querySelectorAll('.indicators-' + classroomId + ' .indicator');
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
        }
        
        // Setup promo navigation for all classrooms
        @foreach($classrooms as $classroom)
          setupPromoNavigation('{{ $classroom->id }}');
        @endforeach
        
        // Scroll to active classroom if URL has classroom_id
        const urlParams = new URLSearchParams(window.location.search);
        const classroomId = urlParams.get('classroom_id');
        if (classroomId) {
          const activeClassroom = document.getElementById('classroom-' + classroomId);
          if (activeClassroom) {
            setTimeout(() => {
              activeClassroom.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
              });
            }, 500); // Delay scrolling slightly to ensure page is fully loaded
          }
        }
      });
      
      // Print function
      function printSchedule() {
        window.print();
      }
    </script>
@endsection