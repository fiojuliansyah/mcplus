<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="/assets/images/logo.png" alt="site logo" class="light-logo">
            <img src="/assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="/assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>{{ Translation::getTranslation('dashboard') }}</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Application</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-2-line text-xl me-14 d-flex w-auto"></i>
                    <span>Manage</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('tutors.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Manage Tutors</a>
                    </li>
                    <li>
                        <a href="{{ route('bios.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Manage Bio</a>
                    </li>
                    <li>
                        <a href="{{ route('programs.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Manage Program</a>
                    </li>
                    <li>
                        <a href="{{ route('plusian-kits.index') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Manage Plusian Kit</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Category</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-group-title">Setting</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-settings-line text-xl me-14 d-flex w-auto"></i>
                    <span>Role & Access</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('roles.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Role & Access</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Users</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>{{ Translation::getTranslation('settings') }}</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="company.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Company</a>
                    </li>
                    <li>
                        <a href="{{ route('languages.index') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Languages</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>