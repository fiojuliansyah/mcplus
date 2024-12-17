<section class="breadcrumb py-120 bg-main-25 position-relative z-1 overflow-hidden mb-0">
    <img src="/frontend/assets/images/shapes/shape-bear.png" alt=""
        class="shape one animation-rotation d-md-block d-none" width="50">
    <img src="/frontend/assets/images/shapes/shape-plussian.png" alt=""
        class="shape two animation-scalation d-md-block d-none" width="200">
    <img src="/frontend/assets/images/shapes/shape3.png" alt=""
        class="shape eight animation-walking d-md-block d-none">
    <img src="/frontend/assets/images/shapes/shape5.png" alt=""
        class="shape six animation-walking d-md-block d-none">
    <img src="/frontend/assets/images/shapes/shape4.png" alt="" class="shape four animation-scalation">
    <img src="/frontend/assets/images/shapes/shape4.png" alt="" class="shape nine animation-scalation">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb__wrapper">
                    <h1 class="breadcrumb__title display-4 fw-semibold text-center">{{ $breadCrumb }}</h1>
                    <ul class="breadcrumb__list d-flex align-items-center justify-content-center gap-4">
                        <li class="breadcrumb__item">
                            <a href="/"
                                class="breadcrumb__link text-neutral-500 hover-text-main-600 fw-medium">
                                MC PLUS</a>
                        </li>
                        <li class="breadcrumb__item">
                            <i class="text-neutral-500 d-flex ph-bold ph-caret-right"></i>
                        </li>
                        <li class="breadcrumb__item">
                            <a href="course.html"
                                class="breadcrumb__link text-neutral-500 hover-text-main-600 fw-medium"> </a>
                        </li>
                        <li class="breadcrumb__item d-none">
                            <i class="text-neutral-500 d-flex ph-bold ph-caret-right"></i>
                        </li>
                        <li class="breadcrumb__item">
                            <span class="text-main-two-600">{{ $breadCrumb }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>