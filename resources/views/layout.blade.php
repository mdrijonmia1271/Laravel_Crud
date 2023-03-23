<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="" href=" {{ asset('/deshboard/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="" href=" {{ url('/deshboard/css/style.css') }}" />
    <link rel="stylesheet" type="" href=" {{ url('/deshboard/css/app.css') }}" />
    <link rel="stylesheet" type="" href=" {{ url('/deshboard/css/responsive.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;500;700;900&family=Rubik:wght@400;500;600;700&display=swap"
    rel="stylesheet" /> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <!-- sidebar menu start -->
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img
                            src="{{ asset('/deshboard/img/290018488_1110770999821005_2691879510461168954_n.png') }}"
                            alt="Admin Panel"></a>
                </div>
            </div>
            <div class="header-text">
                <a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i>Dashboard</a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="management">Management</li>
                            <li>
                                <a href="{{ url('category/index') }}"><i class="bi bi-graph-up"></i><span>Products
                                        Category</span>
                                </a>

                                <ul class="collapse show" id="services">
                                    <li><a href="#">Product Sub Category</a></li>
                                    <li><a href="#">Product Colors</a></li>
                                    <li><a href="#">Product Sizes</a></li>
                                    <li><a href="#">Product Packet</a></li>
                                </ul>
                            </li>
                            {{-- <li><a href="user.php" data-bs-toggle="collapse show"aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Registration </span>
                </a>
              </li>
              <li>
                <a href="{{ route('logout') }}" data-bs-toggle="collapse show"aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Log Out </span>
                </a>
              </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu End -->

        <!-- header area start -->
        <div class="main-content">
            <div class="header-area sticky-top ">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-2 header-left">
                        <div class="nav-btn pull-left">
                            <span><i class="bi bi-list"></i></span>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 header-right">
                        <ul class="notification-area">
                            <div class="user-wrapper">
                                <div class="user-details" data-bs-toggle="collapse"
                                    data-bs-target="#multiCollapseExample2" aria-expanded="false"
                                    aria-controls="multiCollapseExample2">
                                    <img src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_photo }}" alt="User-Profile-Image">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                                <ul class="show-user-details shadow collapse" id="multiCollapseExample2">
                                    <li>
                                        <a href="#"> <i class="bi bi-gear"></i> Settings </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/profile/edit') }}"><i
                                                class="bi bi-person-fill"></i>Edit Profile </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                          this.closest('form').submit();"><i
                                                    class="bi bi-box-arrow-right"></i>
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->

            <!-- main content area start -->
            @yield('body')
        </div>
    </div>
    <script src="/deshboard/js/jquery-2.2.4.min.js"></script>
    <script src="/deshboard/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="/deshboard/js/app.js"></script>
    {{-- <script>
        function onclickErrorHide() {
            var displayStatus = document.querySelector(".alert");
            displayStatus.style.display = 'none';
        };
    </script> --}}
</body>

</html>
