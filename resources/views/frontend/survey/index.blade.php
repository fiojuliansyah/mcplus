<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | MC Plus</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="/survey/assets/css/bootstrap/bootstrap.min.css">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="/survey/assets/css/style.css">

    <!-- responsive -->
    <link rel="stylesheet" href="/survey/assets/css/responsive.css">

    <!-- animation -->
    <link rel="stylesheet" href="/survey/assets/css/animation.css">
</head>
<body>
    <main class="overflow-hidden">

        <!-- background -->
        <div class="main_bg">
            <img src="/survey/assets/images/bg.jpg" alt="Background">
        </div>
        <div class="logo">
            <a href="/">
                <img src="/assets/images/logo-white.png" alt="logo">
            </a>
        </div>
        <section class="surveyForm">
            <form method="POST" action="{{ route('survey.store') }}" class="show-section">
                @csrf
            
                <!-- Step 1: User Information -->
                <section class="steps active">
                    <article class="step_content">
                        <h1 class="mainheading">Your Information</h1>
                    </article>
            
                    <div class="row">
                        <div class="col-md-6">
                            <label class="formLabel">Full Name</label>
                            <input type="text" class="form-control mt-2" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="formLabel">Email</label>
                            <input type="email" class="form-control mt-2" name="email" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="formLabel">Phone</label>
                            <input type="text" class="form-control mt-2" name="phone" required>
                        </div>
                        <div class="col-md-6">
                            <label class="formLabel">Class</label>
                            <select name="classroom_id" class="form-control mt-2" required>
                                <option value="">Choose</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
                    <button class="next" type="button">Next</button>
                </section>
            
                <!-- Survey Questions -->
                @foreach ($questions as $question)
                    <section class="steps">
                        <article class="step_content">
                            <h1 class="mainheading">Survey Subjects</h1>
                            <p>{{ $question->question_text }}</p>
                        </article>
            
                        @if ($question->type == 'multiple')
                            <fieldset>
                                <div class="row">
                                    @foreach ($question->answers as $answer)
                                        <div class="col-md-5 lap-50 sm-100">
                                            <div class="radiofield fadeLeft">
                                                <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $answer->id }}">
                                                <label class="formLabel">{{ $answer->answer_text }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        @elseif($question->type == 'single')
                            <fieldset>
                                <div class="row">
                                    @foreach ($question->answers as $answer)
                                        <div class="col-md-5 lap-50 sm-100">
                                            <div class="radiofield fadeLeft">
                                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                                                <label class="formLabel">{{ $answer->answer_text }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        @else
                            <textarea class="form-control" name="answers[{{ $question->id }}]" required></textarea>
                        @endif
            
                        <button class="next" type="button">Next</button>
                    </section>
                @endforeach
            
                <!-- Final Step: Submit Button -->
                <section class="steps">
                    <article class="step_content">
                        <h1 class="mainheading">Final Step</h1>
                        <p>Thank you for filling out the survey. Click Submit to complete!</p>
                    </article>
            
                    <button type="submit" class="btn btn-primary">Submit</button>
                </section>
            </form>
            
        </section>
    </main>



    <div id="error"></div>

    <script src="/survey/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="/survey/assets/js/jQuery/jquery-3.6.4.min.js"></script>
    <script src="/survey/assets/js/custom.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const steps = document.querySelectorAll(".steps");
            const nextButtons = document.querySelectorAll(".next");
            let currentStep = 0;
    
            steps.forEach((step, index) => {
                if (index !== 0) step.style.display = "none";
            });
    
            function nextStep() {
                if (currentStep < steps.length - 1) {
                    steps[currentStep].style.display = "none";
                    currentStep++;
                    steps[currentStep].style.display = "block";
                }
            }
    
            nextButtons.forEach(button => {
                button.addEventListener("click", function() {
                    nextStep();
                });
            });
        });
    </script>
    
    
</body>
</html>