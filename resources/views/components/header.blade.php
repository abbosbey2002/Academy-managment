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
                
                <!--! [Start] nxl-head-mobile-toggler !-->
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none;">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
                <!--! [Start] nxl-head-mobile-toggler !-->

                <div class="dropdown nxl-h-item nxl-lavel-menu">
                    <a href="javascript:void(0);" class="avatar-text avatar-md bg-primary text-white " data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                        <i class="feather-plus"></i>
                    </a>
                    <div class="dropdown-menu nxl-h-dropdown " data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 57px);">
                        <div class="dropdown nxl-level-menu">
                            <a href="{{route('branch.create')}}" class="dropdown-item">
                                <span class="hstack">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>{{ __('sidebar.general.create_branch') }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="dropdown nxl-level-menu">
                            <a href="{{route('groups.create')}}" class="dropdown-item">
                                <span class="hstack">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>{{ __('sidebar.general.create_group') }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="dropdown nxl-level-menu">
                            <a href="{{route('courses.create')}}" class="dropdown-item">
                                <span class="hstack">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>{{ __('sidebar.general.create_course') }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="dropdown nxl-level-menu">
                            <a href="{{route('register')}}" class="dropdown-item">
                                <span class="hstack">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>{{ __('sidebar.general.create_employee') }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="dropdown nxl-level-menu">
                            <a href="{{route('students.create')}}" class="dropdown-item">
                                <span class="hstack">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>{{ __('sidebar.general.create_student') }}</span>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
                
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
                                    <h6 class="mb-0">{{ __('header.general.select_language') }}</h6>
                                    <p class="fs-11 text-muted mb-0">2 {{ __('header.general.language_exists') }}!</p>
                                </div>
                                <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="{{ __('header.general.add_language') }}">
                                    <i class="feather-plus"></i>
                                </a>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="row px-4 pt-3">
                                <div class="col-sm-4 col-6 language_select {{ App::getLocale() == 'uz' ? 'active' : '' }}">
                                    <a href="{{ route('lang.switch', 'uz') }}" class="d-flex align-items-center gap-2">
                                        <div class="avatar-image avatar-sm"><img src="{{ asset('assets/vendors/img/flags/1x1/uz.svg') }}" alt="" class="img-fluid" /></div>
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
                    <div class="dropdown nxl-h-item nxl-header-search">
                        <a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <i class="feather-search"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-search-dropdown">
                            <div class="input-group search-form">
                                <span class="input-group-text">
                                    <i class="feather-search fs-6 text-muted"></i>
                                </span>
                                <input type="text" class="form-control search-input-field" placeholder="{{ __('header.general.search') }}....">
                                <span class="input-group-text">
                                    <button type="button" class="btn-close"></button>
                                </span>
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <div class="search-items-wrapper">
                                <div class="searching-for px-4 py-2">
                                    <p class="fs-11 fw-medium text-muted">I'm searching for...</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Projects</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Leads</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Contacts</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Inbox</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Invoices</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Tasks</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">employees</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Notes</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Affiliate</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Storage</a>
                                        <a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold">Calendar</a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="recent-result px-4 py-2">
                                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Recnet <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text rounded">
                                                <i class="feather-airplay"></i>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">CRM dashboard redesign</a>
                                                <p class="fs-11 text-muted mb-0">Home / project / crm</p>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="badge border rounded text-dark">/<i class="feather-command ms-1 fs-10"></i></a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text rounded">
                                                <i class="feather-file-plus"></i>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Create new document</a>
                                                <p class="fs-11 text-muted mb-0">Home / tasks / docs</p>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="badge border rounded text-dark">N /<i class="feather-command ms-1 fs-10"></i></a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text rounded">
                                                <i class="feather-user-plus"></i>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Invite project colleagues</a>
                                                <p class="fs-11 text-muted mb-0">Home / project / invite</p>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1 fs-10"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider my-3"></div>
                                <div class="users-result px-4 py-2">
                                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Users <span class="badge small bg-gray-200 rounded ms-1 text-dark">5</span></h4>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image rounded">
                                                <img src="#" alt="" class="img-fluid">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Alexandra Della</a>
                                                <p class="fs-11 text-muted mb-0">alex.della@outlook.com</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image rounded">
                                                <img src="#" alt="" class="img-fluid">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Green Cute</a>
                                                <p class="fs-11 text-muted mb-0">green.cute@outlook.com</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image rounded">
                                                <img src="#" alt="" class="img-fluid">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Malanie Hanvey</a>
                                                <p class="fs-11 text-muted mb-0">malanie.anvey@outlook.com</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image rounded">
                                                <img src="#" alt="" class="img-fluid">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Kenneth Hune</a>
                                                <p class="fs-11 text-muted mb-0">kenth.hune@outlook.com</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image rounded">
                                                <img src="#" alt="" class="img-fluid">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Archie Cantones</a>
                                                <p class="fs-11 text-muted mb-0">archie.cones@outlook.com</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-divider my-3"></div>
                                <div class="file-result px-4 py-2">
                                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Files <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image bg-gray-200 rounded">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Project Style CSS</a>
                                                <p class="fs-11 text-muted mb-0">05.74 MB</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-download"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image bg-gray-200 rounded">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Dashboard Project Zip</a>
                                                <p class="fs-11 text-muted mb-0">46.83 MB</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-download"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-image bg-gray-200 rounded">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="font-body fw-bold d-block mb-1">Project Document PDF</a>
                                                <p class="fs-11 text-muted mb-0">12.85 MB</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="avatar-text avatar-md">
                                            <i class="feather-download"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-divider mt-3 mb-0"></div>
                                <a href="javascript:void(0);" class="p-3 fs-10 fw-bold text-uppercase text-center d-block">Loar More</a>
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
                    <div class="dropdown nxl-h-item">
                        <a class="nxl-head-link me-3 " data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside">
                            <i class="feather-bell"></i>
                            <span class="badge bg-danger nxl-h-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
                            <div class="d-flex justify-content-between align-items-center notifications-head">
                                <h6 class="fw-bold text-dark mb-0">{{ __('header.general.notifications') }}</h6>
                                <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" title="Make as Read">
                                    <i class="feather-check"></i>
                                    <span>{{ __('header.general.make_read') }}</span>
                                </a>
                            </div>
                            <div class="notifications-item">
                                <img style="display:none" src="#" alt="" class="rounded me-3 border">
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
                            <div class="text-center notifications-footer">
                                <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">{{ __('header.general.all_notifications') }}</a>
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
                                        <span class="badge small bg-gray-200 rounded ms-1 text-dark">{{ __('messages.general.welcome') }}, Student{{ Auth::guard('student')->user()->first_name }}</span>
                                        @endif

                                        @if(Auth::guard('web')->check())
                                            <h6 class="text-dark mb-0">{{ __('messages.general.welcome') }}, {{ Auth::guard('web')->user()->first_name }} </h6>
                                            <span class="fs-12 fw-medium text-muted">{{ Auth::guard('web')->user()->email }}</span>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-user"></i>
                                <span>{{ __('header.general.profile_details') }}</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-settings"></i>
                                <span>{{ __('header.general.profile_settings') }}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            
                            <!-- Logout uchun form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <!-- Logout uchun link -->
                            <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="feather-log-out"></i>
                                <span>{{ __('buttons.general.logout') }}</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!--! [End] Header Right !-->
        </div>
    </header>
