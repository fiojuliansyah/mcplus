<header class="header">
    <div class="container container--xl">
        <nav class="header-inner flex-between gap-8">

            <div class="header-content-wrapper flex-align flex-grow-1">
                <!-- Logo Start -->
                <div class="logo">
                    <a href="index.html" class="link">
                        <img src="/frontend/assets/images/logo/logo.png" alt="Logo">
                    </a>
                </div>
                <!-- Logo End  -->

                <!-- Select Start -->
                <div class="d-sm-block d-none">
                    <div class="header-select border border-neutral-30 bg-main-25 rounded-pill position-relative">
                        <span
                            class="select-icon position-absolute top-50 translate-middle-y inset-inline-start-0 z-1 ms-lg-4 ms-12 text-xl pointer-event-none d-flex">
                            <i class="ph-bold ph-squares-four"></i>
                        </span>
                        <select class="js-example-basic-single border-0" name="state">
                            <option value="1" selected disabled>Categories</option>
                            <option value="1">Design</option>
                            <option value="1">Development</option>
                            <option value="1">Architecture</option>
                            <option value="1">Life Style</option>
                            <option value="1">Data Science</option>
                            <option value="1">Marketing</option>
                            <option value="1">Music</option>
                            <option value="1">Typography</option>
                            <option value="1">Finance</option>
                            <option value="1">Motivation</option>
                        </select>
                    </div>
                </div>
                <!-- Select End -->

                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none">

                    <ul class="nav-menu flex-align">
                        <li class="nav-menu__item">
                            <a href="{{ route('frontend.tutors.index') }}" class="nav-menu__link {{ request()->routeIs(['frontend.tutors.index','frontend.tutors.detail']) ? 'activePage' : '' }}">
                                {{ Translation::getTranslation('Tutors') }}
                            </a>
                        </li>
                    </ul>                    
                </div>
                <!-- Menu End  -->
            </div>

            <!-- Header Right start -->
            <div class="header-right flex-align">
                <form action="#" class="search-form position-relative d-xl-block d-none">
                    <input type="text" class="common-input rounded-pill bg-main-25 pe-48 border-neutral-30"
                        placeholder="Search...">
                    <button type="submit"
                        class="w-36 h-36 bg-main-600 hover-bg-main-700 rounded-circle flex-center text-md text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                        <i class="ph-bold ph-magnifying-glass"></i>
                    </button>
                </form>
                <a href="sign-in.html"
                    class="info-action w-52 h-52 bg-main-25 hover-bg-main-600 border border-neutral-30 rounded-circle flex-center text-2xl text-neutral-500 hover-text-white hover-border-main-600">
                    <i class="ph ph-user-circle"></i>
                </a>
                <button type="button" class="toggle-mobileMenu d-lg-none text-neutral-200 flex-center">
                    <i class="ph ph-list"></i>
                </button>
            </div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>