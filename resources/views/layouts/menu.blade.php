<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <!-- Header -->
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
                <span class="brand-logo"></span>
                <h2 class="brand-text">نظام الزوار</h2>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <!-- Main Menu -->
    <div class="main-menu">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <!-- بيانات المسجلين -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub {{ request()->routeIs('new') ? 'active' : '' }}">
                    <i data-feather="user" class="text-primary"></i>
                    <span class="menu-item-label">بيانات المسجلين</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item">
                        <a href="{{ url('admin/show/registration') }}" class="sub-link {{ request()->routeIs('new') ? 'active' : '' }}">
                            <i data-feather="circle" class="text-primary"></i> الملتقى
                        </a>
                    </li>
                    @if(auth()->user()->id == '1')
                        <li class="sub-item">
                            <a href="{{ url('admin/show/registration-training') }}" class="sub-link">
                                <i data-feather="user" class="text-success"></i> تدريب
                            </a>
                        </li>
                        <li class="sub-item">
                            <a href="{{ url('admin/show/registration-workshops') }}" class="sub-link">
                                <i data-feather="user" class="text-success"></i> الورش
                            </a>
                        </li>
                    @endif
                    <li class="sub-item">
                        <a href="{{ url('admin/show/registration-survey') }}" class="sub-link {{ request()->routeIs('new') ? 'active' : '' }}">
                            <i data-feather="circle" class="text-primary"></i> الاستبيانات
                        </a>
                    </li>
                </ul>
            </li>

            <!-- تسجيل الحضور -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i data-feather="log-in" class="text-primary"></i>
                    <span class="menu-item-label">تسجيل الحضور الملتقى</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item">
                        <a href="{{ url('admin/attend') }}" class="sub-link">
                            <i data-feather="circle" class="text-primary"></i> تسجيل الحضور للملتقى
                        </a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ url('admin/attend&print') }}" class="sub-link">
                            <i data-feather="circle" class="text-primary"></i> تسجيل حضور مع طباعة
                        </a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->id == '1')

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i data-feather="log-in" class="text-primary"></i>
                    <span class="menu-item-label">تسجيل الحضور تدريب</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item">
                        <a href="{{ url('admin/attend-training') }}" class="sub-link">
                            <i data-feather="circle" class="text-primary"></i> تسجيل الحضور تدريب
                        </a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ url('admin/attend&print/training') }}" class="sub-link">
                            <i data-feather="circle" class="text-primary"></i> تسجيل حضور مع طباعة
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- الطباعة -->
            <li class="br-menu-item">
                <a href="{{ url('admin/print/registration') }}" class="br-menu-link">
                    <i data-feather="printer" class="text-primary"></i>
                    <span class="menu-item-label">طباعة البادج الملتقى</span>
                </a>
            </li>
            @if(auth()->user()->id == '1')

            <li class="br-menu-item">
                <a href="{{ url('admin/print/registration-training') }}" class="br-menu-link">
                    <i data-feather="printer" class="text-primary"></i>
                    <span class="menu-item-label">طباعة البادج التدريب</span>
                </a>
            </li>

            <!-- الاحصائيات -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i data-feather="layers" class="text-primary"></i>
                    <span class="menu-item-label">الاحصائيات</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item">
                        <a href="{{ url('admin/attends-per-day-reg') }}" class="sub-link {{ request()->routeIs('new') ? 'active' : '' }}">
                            <i data-feather="circle" class="text-primary"></i> (ملتقى) الحضور حسب اليوم
                        </a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ url('admin/attends-per-day-training') }}" class="sub-link {{ request()->routeIs('new') ? 'active' : '' }}">
                            <i data-feather="circle" class="text-primary"></i> (تدريب) الحضور حسب اليوم
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            <li class="br-menu-item">
                <a href="{{ url('admin/register-categories') }}" class="br-menu-link">
                    <i data-feather="users" class="text-primary"></i>
                    <span class="menu-item-label">تسجيل الفئات</span>
                </a>
            </li>


        </ul>
    </div>
</div>
