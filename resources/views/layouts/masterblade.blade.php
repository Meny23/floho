<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon-16x16.png" type='image/x-icon'>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="main-wrapper">
        <div class="header-outer">
            <div class="header">
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars"
                        aria-hidden="true"></i></a>
                <a id="toggle_btn" class="float-left" href="javascript:void(0);">
                    <img src="{{ asset('img/sidebar/icon-21.png') }}" alt="">
                </a>
                <ul class="nav float-left">
                    <li>
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                            </a>
                            <form action="inbox.html">
                                <input class="form-control" type="text" placeholder="Search here">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="mobile-logo d-md-block d-lg-none d-block"><img
                                src="{{ asset('img/logo1.png') }}" alt="" width="30" height="30">
                        </a>
                    </li>
                </ul>
                <ul class="nav user-menu float-right">
                    @guest
                    @else
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <img src="{{ asset('img/sidebar/icon-22.png') }}" alt="">
                            </a>
                            <div class="dropdown-menu notifications">
                                <div class="topnav-dropdown-header">
                                    <span>Notificaciones</span>
                                </div>
                                <div class="drop-scroll">
                                    <ul class="notification-list">
                                        <li class="notification-message">
                                            <a href="#">
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="John Doe" src="{{ asset('img/user-06.jpg') }}"
                                                            class="img-fluid rounded-circle">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details"><span class="noti-title">John Doe</span> is
                                                            now following you </p>
                                                        <p class="noti-time"><span class="notification-time">4 mins
                                                                ago</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-message">
                                            <a href="#">
                                                <div class="media">
                                                    <span class="avatar">T</span>
                                                    <div class="media-body">
                                                        <p class="noti-details"><span class="noti-title">Tarah
                                                                Shropshire</span> sent you a message.</p>
                                                        <p class="noti-time"><span class="notification-time">6 mins
                                                                ago</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-message">
                                            <a href="#">
                                                <div class="media">
                                                    <span class="avatar">L</span>
                                                    <div class="media-body">
                                                        <p class="noti-details"><span class="noti-title">Misty Tison</span>
                                                            like your photo.</p>
                                                        <p class="noti-time"><span class="notification-time">8 mins
                                                                ago</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-message">
                                            <a href="#">
                                                <div class="media">
                                                    <span class="avatar">G</span>
                                                    <div class="media-body">
                                                        <p class="noti-details"><span class="noti-title">Rolland
                                                                Webber</span> booking appoinment for meeting.</p>
                                                        <p class="noti-time"><span class="notification-time">12 mins
                                                                ago</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-message">
                                            <a href="#">
                                                <div class="media">
                                                    <span class="avatar">T</span>
                                                    <div class="media-body">
                                                        <p class="noti-details"><span class="noti-title">Bernardo
                                                                Galaviz</span> like your photo.</p>
                                                        <p class="noti-time"><span class="notification-time">2 days
                                                                ago</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="topnav-dropdown-footer">
                                    <a href="#">View all Notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a href="{{ Route('settings') }}" class="dropdown-toggle nav-link">
                                <i class="fa fa-cog"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown has-arrow">
                            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <i class="fa fa-user"></i>
                                    {{-- <img class="rounded-circle" src="{{ asset('img/user-06.jpg') }}" width="30"
                                        alt="Admin"> --}}
                                    <span class="status online"></span>
                                </span>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ Route('users.my_profile') }}"><i
                                        class="fa fa-user-circle"></i> Mi perfil</a>
                                <a class="dropdown-item" href="#">Edit Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                        </li>
                    @endguest

                </ul>
                <div class="dropdown mobile-user-menu float-right">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ Route('users.my_profile') }}">Mi perfil</a>
                        <a class="dropdown-item" href="#">Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <div class="header-left">
                        <a href="/home" class="logo">
                            <img src="{{ asset('img/logo1.png') }}" width="40" height="40" alt="">
                            <span class="text-uppercase">Floho</span>
                        </a>
                    </div>
                    <ul class="sidebar-ul">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="/home"><img src="{{ asset('img/sidebar/icon-1.png') }}"
                                    alt="icon"><span>Dashboard</span></a>
                        </li>
                        @foreach (Auth::user()->assignedMenus() as $assignedMenu)
                            <li class="submenu">
                                <a href="#" class="noti-dot"><img
                                        src="{{ asset("img/sidebar/$assignedMenu->icon.png") }}" alt="icon">
                                    <span>
                                        {{ $assignedMenu->name }}</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    @foreach ($assignedMenu->menus as $menu)
                                        <li class="{!! Request::is($menu->link) ? 'active' : '' !!}">
                                            <a href="{{ $menu->link }}">
                                                <span>{{ $menu->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        {{-- <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-2.png" alt="icon"> <span>
                                    Teachers</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="#"><span>All Teachers</span></a></li>
                                <li><a href="#"><span>Add Teacher</span></a></li>
                                <li><a href="#"><span>Edit Teacher</span></a></li>
                                <li><a href="#"><span>About Teacher</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-3.png" alt="icon"> <span>
                                    Students</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="#"><span>All Students</span></a></li>
                                <li><a href="#"><span>Add Student</span></a></li>
                                <li><a href="#"><span>Edit Student</span></a></li>
                                <li><a href="#"><span>ABout student</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-4.png" alt="icon"> <span>
                                    Parents</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="#"><span>All Parents</span></a></li>
                                <li><a href="#"><span>Add Parent</span></a></li>
                                <li><a href="#"><span>Edit Parent</span></a></li>
                                <li><a href="#"><span>About Parent</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="img/sidebar/icon-5.png" alt="icon">
                                <span>Apps</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Email</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="#"><span>Compose Mail</span></a></li>
                                        <li>
                                            <a href="inbox.html"> <span> Inbox</span> </a>
                                        </li>
                                        <li><a href="inbox.html"><span>Mailview</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"> Chat <span
                                            class="badge badge-pill bg-primary float-right">5</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="inbox.html"><span>Voice Call</span></a></li>
                                        <li><a href="inbox.html"><span>Video Call</span></a></li>
                                        <li><a href="inbox.html"><span>Incoming Call</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="inbox.html"><span> Contacts</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="inbox.html"><img src="img/sidebar/icon-6.png" alt="icon">
                                <span>Calendar</span></a>
                        </li>
                        <li>
                            <a href="inbox.html"><img src="img/sidebar/icon-7.png" alt="icon"> <span>Exam
                                    list</span></a>
                        </li>
                        <li>
                            <a href="inbox.html"><img src="img/sidebar/icon-8.png" alt="icon">
                                <span>Holidays</span></a>
                        </li>
                        <li>
                            <a href="inbox.html"><img src="img/sidebar/icon-9.png" alt="icon"><span>
                                    Events</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-10.png" alt="icon"><span>
                                    Accounts </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="inbox.html"><span>Invoices</span></a></li>
                                <li><a href="inbox.html"><span>Payments</span></a></li>
                                <li><a href="inbox.html"><span>Expenses</span></a></li>
                                <li><a href="inbox.html"><span>Provident Fund</span></a></li>
                                <li><a href="inbox.html"><span>Taxes</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-11.png" alt="icon"><span> Payroll
                                </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="inbox.html"><span> Employee Salary </span></a></li>
                                <li><a href="inbox.html"><span> Payslip </span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-12.png" alt="icon"> <span>
                                    Blog</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="inbox.html"><span>Blog</span></a></li>
                                <li><a href="inbox.html"><span>Blog View</span></a></li>
                                <li><a href="inbox.html"><span>Add Blog</span></a></li>
                                <li><a href="inbox.html"><span>Edit Blog</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="noti-dot"><img src="img/sidebar/icon-13.png"
                                    alt="icon"> <span>Management </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="#"><span> Employees</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="inbox.html"><span>All Employees</span></a></li>
                                        <li><a href="inbox.html"><span>Holidays</span></a></li>
                                        <li><a href="inbox.html"><span>Leave Requests</span> <span
                                                    class="badge badge-pill bg-primary float-right">1</span></a></li>
                                        <li><a href="inbox.html"><span>Attendance</span></a></li>
                                        <li><a href="inbox.html"><span>Departments</span></a></li>
                                        <li><a href="inbox.html"><span>Designations</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span>Activities</span></a>
                                </li>
                                <li>
                                    <a href="inbox.html"><span>Users</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="#"><span> Reports </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="inbox.html"> <span>Expense Report </span></a></li>
                                        <li><a href="inbox.html"> <span>Invoice Report</span> </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="inbox.html"><img src="img/sidebar/icon-14.png" alt="icon">
                                <span>Settings</span></a>
                        </li>
                        <li class="menu-title">UI Elements</li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-15.png" alt="icon"> <span>
                                    Components</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="inbox.html"><span>UI Kit</span></a></li>
                                <li><a href="inbox.html"><span>Typography</span></a></li>
                                <li><a href="inbox.html"><span>Tabs</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-26.png" alt="icon"> <span>
                                    Elements</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="inbox.html">Sweet Alerts</a></li>
                                <li><a href="inbox.html">Tooltip</a></li>
                                <li><a href="inbox.html">Popover</a></li>
                                <li><a href="inbox.html">Ribbon</a></li>
                                <li><a href="inbox.html">Clipboard</a></li>
                                <li><a href="inbox.html">Drag & Drop</a></li>
                                <li><a href="inbox.html">Range Slider</a></li>
                                <li><a href="inbox.html">Rating</a></li>
                                <li><a href="inbox.html">Toastr</a></li>
                                <li><a href="inbox.html">Text Editor</a></li>
                                <li><a href="inbox.html">Counter</a></li>
                                <li><a href="inbox.html">Scrollbar</a></li>
                                <li><a href="inbox.html">Spinner</a></li>
                                <li><a href="inbox.html">Notification</a></li>
                                <li><a href="inbox.html">Lightbox</a></li>
                                <li><a href="inbox.html">Sticky Note</a></li>
                                <li><a href="inbox.html">Timeline</a></li>
                                <li><a href="inbox.html">Horizontal Timeline</a></li>
                                <li><a href="inbox.html">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="img/sidebar/icon-27.png" alt="icon"> <span>
                                    Chart</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="inbox.html">Apex Charts</a></li>
                                <li><a href="inbox.html">Chart Js</a></li>
                                <li><a href="inbox.html">Morris Charts</a></li>
                                <li><a href="inbox.html">Flot Charts</a></li>
                                <li><a href="inbox.html">Peity Charts</a></li>
                                <li><a href="inbox.html">C3 Charts</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="page-title mb-0">@yield('title-header')</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a>
                                </li>
                                @if (isset($breadcrumbs))
                                    @foreach ($breadcrumbs as $breadcrumb)
                                        @if ($breadcrumb['active'])
                                            <li class="breadcrumb-item">
                                                <span>{{ $breadcrumb['name'] }}</span>
                                            </li>
                                        @else
                                            <li class="breadcrumb-item">
                                                <a href="/{{ $breadcrumb['link'] }}">
                                                    {{ $breadcrumb['name'] }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <script src="{{ asset('js/chart-data.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
