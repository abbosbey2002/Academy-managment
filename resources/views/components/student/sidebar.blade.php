    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{route('student.dashboard')}}" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{ asset('/assets/images/logo/dacademy.png') }}" alt="" class="logo logo-lg">
                    <img src="{{ asset('//assets/images/logo/icon.png') }}" alt="" class="logo logo-sm">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{route('student.dashboard')}}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.dashboard') }}</span><span class="nxl-arrow"></span>
                        </a>

                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.billing') }}</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('invoices.index')}}">Invoices</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('payments.index')}}">Payments</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('transaction.index')}}">{{ __('messages.general.transaction')}} </a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">{{ __('sidebar.general.settings') }}</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{route('translations.index')}}">{{__('messages.general.translation')}}</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{route('translations.sidebar')}}">Sidebar</a></li>
                        </ul>
                    </li>


                    <div class="card text-center">
                        <div class="card-body">
                            <i class="feather-sunrise fs-4 text-dark"></i>
                            <h6 class="mt-4 text-dark fw-bolder">{{__('sidebar.general.comming_son')}}</h6>
                            <p class="fs-11 my-3 text-dark">{{__('sidebar.son_title')}}</p>
                        </div>
                    </div>

                </ul>

            </div>
        </div>
    </nav>
