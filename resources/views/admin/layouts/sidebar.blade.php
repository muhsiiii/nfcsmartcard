
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        &nbsp;MUHSIN
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i> &nbsp;Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('adminhome') }}" class="brand-link">
                <img src="{{ asset('images/download.png') }}" alt="NFC" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text" style="margin-left: 0px;"><b>NFC</b><span>smart</span></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">

                        <!-- Dashboard Side Menus -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('adminhome') }}" class="nav-link  active ">
                                <i class="nav-icon fa fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="fa-solid fa-address-card" style="margin-left: 5px;"></i>
                                <p style="margin-left: 8px;">Registrations<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('userlist') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="fs-15">Users</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('campanylist') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="fs-15">Campanies</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="fa-sharp fa-solid fa-gear" style="margin-left: 5px;font-size:20px;"></i>
                                <p style="margin-left: 7px;">Settings<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('changepassword') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="fs-15">Change Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="fs-15">Logout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-th-large"></i>
                            <p>Category</p>
                        </a>
                    </li> --}}



                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Content Wrapper. Contains page content -->
