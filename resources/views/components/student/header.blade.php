<header class="nxl-header">
    <div class="header-wrapper">
        <!--! [Start] Header Left !-->
        <div class="header-left d-flex align-items-center gap-4">
            <!--! [Start] nxl-head-mobile-toggler !-->
            <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>

            <div class="nxl-navigation-toggle">
                <a href="javascript:void(0);" id="menu-mini-button">
                    <i class="feather-align-left"></i>
                </a>
                <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                    <i class="feather-arrow-right"></i>
                </a>
            </div>
            <!--! [End] nxl-navigation-toggle !-->
            <!--! [Start] nxl-lavel-mega-menu-toggle !-->
            <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                <a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
                    <i class="feather-align-left"></i>
                </a>
            </div>
            <!--! [End] nxl-lavel-mega-menu-toggle !-->
            <!--! [Start] nxl-lavel-mega-menu !-->
            <div class="nxl-drp-link nxl-lavel-mega-menu">
                <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                    <a href="javascript:void(0)" id="nxl-lavel-mega-menu-hide">
                        <i class="feather-arrow-left me-2"></i>
                        <span>{{__('messages.general.back')}}</span>
                    </a>
                </div>
                <!--! [Start] nxl-lavel-mega-menu-wrapper !-->
                
                <!--! [End] nxl-lavel-mega-menu-wrapper !-->
            </div>
            <!--! [End] nxl-lavel-mega-menu !-->
        </div>
        <!--! [End] Header Left !-->
        <!--! [Start] Header Right !-->
        <div class="header-right ms-auto ">
            <div class="d-flex align-items-center">
                <div class="dropdown nxl-h-item nxl-header-language d-none d-sm-flex">
                    <a href="javascript:void(0);" class="nxl-head-link me-0 nxl-language-link" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <img src="{{ asset('assets/vendors/img/flags/4x3/us.svg') }}" alt="" class="img-fluid wd-20" />
                    </a>
                <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-language-dropdown">
                    <div class="dropdown-divider mt-0"></div>
                    <div class="language-items-wrapper">
                        <div class="select-language px-4 py-2 hstack justify-content-between gap-4">
                            <div class="lh-lg">
                                <h6 class="mb-0">{{__('messages.select_lan')}}</h6>
                                <p class="fs-11 text-muted mb-0">2 languages available!</p>
                            </div>
                            <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Add Language">
                                <i class="feather-plus"></i>
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row px-4 pt-3">
                            <div class="col-sm-4 col-6 language_select {{ App::getLocale() == 'uz' ? 'active' : '' }}">
                                <a href="{{ route('lang.switch', 'uz') }}" class="d-flex align-items-center gap-2">
                                    <div class="avatar-image avatar-sm"><img src="{{ asset('assets/vendors/img/flags/1x1/sa.svg') }}" alt="" class="img-fluid" /></div>
                                    <span>O'zbekcha</span>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 language_select {{ App::getLocale() == 'en' ? 'active' : '' }}">
                                <a href="{{ route('lang.switch', 'en') }}" class="d-flex align-items-center gap-2">
                                    <div class="avatar-image avatar-sm"><img src="{{ asset('assets/vendors/img/flags/1x1/us.svg') }}" alt="" class="img-fluid" /></div>
                                    <span>English</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                <div class="nxl-h-item d-none d-sm-flex">
                    <div class="full-screen-switcher">
                        <a href="javascript:void(0);" class="nxl-head-link me-0" onclick="$('body').fullScreenHelper('toggle');">
                            <i class="feather-maximize maximize"></i>
                            <i class="feather-minimize minimize"></i>
                        </a>
                    </div>
                </div>
                <div class="nxl-h-item dark-light-theme">
                    <a href="javascript:void(0);" class="nxl-head-link me-0 dark-button">
                        <i class="feather-moon"></i>
                    </a>
                    <a href="javascript:void(0);" class="nxl-head-link me-0 light-button" style="display: none">
                        <i class="feather-sun"></i>
                    </a>
                </div>
                <div class="dropdown nxl-h-item ">
                    <a href="javascript:void(0);" class="nxl-head-link me-0 " data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                        <i class="feather-clock"></i>
                        <span class="badge bg-success nxl-h-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-timesheets-menu">
                        <div class="d-flex justify-content-between align-items-center timesheets-head">
                            <h6 class="fw-bold text-dark mb-0">Timesheets</h6>
                            <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" title="Upcomming Timers">
                                <i class="feather-clock"></i>
                                <span>3 Upcomming</span>
                            </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center flex-column timesheets-body">
                            <i class="feather-clock fs-1 mb-4"></i>
                            <p class="text-muted">No started timers found yes!</p>
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary">Started Timer</a>
                        </div>
                        <div class="text-center timesheets-footer">
                            <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">Alls Timesheets</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown nxl-h-item">
                    <a class="nxl-head-link me-3 " data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside">
                        <i class="feather-bell"></i>
                        <span class="badge bg-danger nxl-h-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
                        <div class="d-flex justify-content-between align-items-center notifications-head">
                            <h6 class="fw-bold text-dark mb-0">Notifications</h6>
                            <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" title="Make as Read">
                                <i class="feather-check"></i>
                                <span>Make as Read</span>
                            </a>
                        </div>
                        <div class="notifications-item">
                            <img src="#" alt="" class="rounded me-3 border">
                            <div class="notifications-desc">
                                <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span class="fw-semibold text-dark">Malanie Hanvey</span> We should talk about that at lunch!</a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notifications-date text-muted border-bottom border-bottom-dashed">2 minutes ago</div>
                                    <div class="d-flex align-items-center float-end gap-2">
                                        <a href="javascript:void(0);" class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" title="Make as Read"></a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" title="Remove">
                                            <i class="feather-x fs-12"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="notifications-item">
                            <img src="#" alt="" class="rounded me-3 border">
                            <div class="notifications-desc">
                                <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span class="fw-semibold text-dark">Valentine Maton</span> You can download the latest invoices now.</a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notifications-date text-muted border-bottom border-bottom-dashed">36 minutes ago</div>
                                    <div class="d-flex align-items-center float-end gap-2">
                                        <a href="javascript:void(0);" class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" title="Make as Read"></a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" title="Remove">
                                            <i class="feather-x fs-12"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="notifications-item">
                            <img src="#" alt="" class="rounded me-3 border">
                            <div class="notifications-desc">
                                <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span class="fw-semibold text-dark">Archie Cantones</span> Don't forget to pickup Jeremy after school!</a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notifications-date text-muted border-bottom border-bottom-dashed">53 minutes ago</div>
                                    <div class="d-flex align-items-center float-end gap-2">
                                        <a href="javascript:void(0);" class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" title="Make as Read"></a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" title="Remove">
                                            <i class="feather-x fs-12"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center notifications-footer">
                            <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">Alls Notifications</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown nxl-h-item">
                    <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside" class="" aria-expanded="false">
                        <img src="{{ asset('assets/images/avatar/person.jpg') }}" alt="user-image" class="img-fluid user-avtar me-0">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                        <div class="dropdown-header">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/avatar/person.jpg') }}" alt="user-image" class="img-fluid user-avtar">
                                <div>
                                    @if(Auth::guard('student')->check())
                                    <h6 class="text-dark mb-0">Welcome, {{ Auth::guard('student')->user()->first_name }} <span class="badge bg-soft-success text-success ms-1">PRO</span></h6>
                                    <span class="fs-12 fw-medium text-muted">{{ Auth::guard('student')->user()->email }}</span>
                                    @endif

                                    @if(Auth::guard('web')->check())
                                        <h6 class="text-dark mb-0">Welcome, {{ Auth::guard('web')->user()->first_name }} <span class="badge bg-soft-success text-success ms-1">PRO</span></h6>
                                        <span class="fs-12 fw-medium text-muted">{{ Auth::guard('web')->user()->email }}</span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="feather-user"></i>
                            <span>Profile Details</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="feather-settings"></i>
                            <span>Account Settings</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        
                        <!-- Logout uchun form -->
                        <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <!-- Logout uchun link -->
                        <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="feather-log-out"></i>
                            <span>{{ __('sidebar.logout') }}</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!--! [End] Header Right !-->
    </div>
</header>
