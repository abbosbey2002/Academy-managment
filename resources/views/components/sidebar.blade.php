    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
        
            <div class="m-header">
                <a href="{{route('admin')}}" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{ asset('/assets/images/logo/dacademy.png') }}" alt="" class="logo logo-lg">
                    <img src="/assets/images/logo/icon.png" alt="" class="logo logo-sm">
                </a>
            </div>

            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>{{ __('sidebar.general.navigation') }}</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{route('admin')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.dashboard') }}</span><span class="nxl-arrow"></span>
                        </a>

                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-alert-circle"></i></span>
                            <span class="nxl-mtext">Leads</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('crm.index')}}">Leads</a></li>
                        </ul>
                    </li>

                    <li class="nxl-item">
                        <a href="{{route('branch.index')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-life-buoy"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.branches') }}</span>
                        </a>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{route('groups.index')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.groups') }}</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{route('courses.index')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-book"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.courses') }}</span>
                        </a>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{route('student.index')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.students') }}</span>
                        </a>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{route('employee.index')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.employees') }}</span>
                        </a>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="bi bi-bank"></i></span>
                            <span class="nxl-mtext">Bank va kassa</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('expenses.index')}}">{{ __('sidebar.general.expense')}}</a></li>
                        </ul>
                    </li>
                    
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.billing') }}</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('invoices.index')}}">{{ __('branch.invoice')}} </a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('payments.index')}}">{{ __('students.payment')}} </a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('transaction.index')}}">{{ __('messages.general.transaction')}}</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-cast"></i></span>
                            <span class="nxl-mtext">Reports</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('sales') }}">Sales Report </a></li>
                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.settings') }}</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('translations.index')}}">{{ __('sidebar.general.translates') }}</a></li>
                        </ul>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('categories.index')}}">{{ __('sidebar.general.money') }}</a></li>
                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-life-buoy"></i></span>
                            <span class="nxl-mtext">Help Center</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Support</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{route('knowledge')}}">KnowledgeBase</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="javascript:void(0);">Documentations</a></li>
                        </ul>
                    </li>

                    <div class="card text-center">
                        <div class="card-body">
                            <i class="feather-sunrise fs-4 text-dark"></i>
                            <h6 class="mt-4 text-dark fw-bolder">{{ __('sidebar.general.comming_son') }}</h6>
                            <p class="fs-11 my-3 text-dark">{{ __('sidebar.general.son_title') }}</p>
                        </div>
                    </div>


                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-send"></i></span>
                            <span class="nxl-mtext">Applications</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="apps-chat.html">Chat</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-email.html">Email</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-tasks.html">Tasks</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-notes.html">Notes</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-storage.html">Storage</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-calendar.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-at-sign"></i></span>
                            <span class="nxl-mtext">Proposal</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="proposal.html">Proposal</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="proposal-view.html">Proposal View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="proposal-edit.html">Proposal Edit</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="proposal-create.html">Proposal Create</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                            <span class="nxl-mtext">{{ __('students.payment')}} </span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="payment.html">{{ __('students.payment')}}</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="invoice-view.html">Invoice View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="invoice-create.html">Invoice Create</a></li>
                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                            <span class="nxl-mtext">Projects</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="projects.html">Projects</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="projects-view.html">Projects View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="projects-create.html">Projects Create</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-layout"></i></span>
                            <span class="nxl-mtext">Widgets</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="widgets-lists.html">Lists</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-tables.html">Tables</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-charts.html">Charts</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-statistics.html">Statistics</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-miscellaneous.html">Miscellaneous</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">Settings</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="settings-general.html">General</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-seo.html">SEO</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-tags.html">Tags</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-email.html">Email</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-tasks.html">Tasks</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-leads.html">Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-support.html">Support</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-finance.html">Finance</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-gateways.html">Gateways</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-customers.html">Customers</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-localization.html">Localization</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-recaptcha.html">reCAPTCHA</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-miscellaneous.html">Miscellaneous</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-power"></i></span>
                            <span class="nxl-mtext">Authentication</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Login</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="auth-login-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-login-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-login-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Register</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="auth-register-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-register-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-register-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Error-404</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="auth-404-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-404-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-404-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Reset Pass</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="auth-reset-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-reset-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-reset-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Verify OTP</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="auth-verify-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-verify-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-verify-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Maintenance</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="auth-maintenance-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-maintenance-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="auth-maintenance-creative.html">Creative</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                </ul>

            </div>
        </div>
    </nav>
