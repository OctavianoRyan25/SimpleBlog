<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>BacaIN</title>

    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- Easymde Editor-->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- core:css -->
    <link rel="stylesheet" href="/../assets/vendors/core/core.css">
    <link rel="stylesheet" href="/../assets/css/style.min.css">
    <link rel="stylesheet" href="/../assets/css/responsive.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/../assets/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="/../assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="/../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="/../assets/css/demo1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="/../assets/images/favicon.png" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    Baca<span>IN</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item nav-category">Post</li>
                    <li class="nav-item">
                        <a href="/admin/posts" class="nav-link">
                            <i class="link-icon" data-feather="file-text"></i>
                            <span class="link-title">List Post</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/create-posts" class="nav-link">
                            <i class="link-icon" data-feather="file-plus"></i>
                            <span class="link-title">Buat Post</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="/admin/posts" class="nav-link">
                            <i class="link-icon" data-feather="file-text"></i>
                            <span class="link-title">List Post</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/category" class="nav-link">
                            <i class="link-icon" data-feather="file-text"></i>
                            <span class="link-title">List category</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <h6 class="text-muted mb-2">Sidebar:</h6>
                <div class="mb-3 pb-3 border-bottom">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                            value="sidebar-light" checked>
                        <label class="form-check-label" for="sidebarLight">
                            Light
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                            value="sidebar-dark">
                        <label class="form-check-label" for="sidebarDark">
                            Dark
                        </label>
                    </div>
                </div>
                <div class="theme-wrapper">
                    <h6 class="text-muted mb-2">Light Theme:</h6>
                    <a class="theme-item active" href="../demo1/dashboard.html">
                        <img src="../assets/images/screenshots/light.jpg" alt="light theme">
                    </a>
                    <h6 class="text-muted mb-2">Dark Theme:</h6>
                    <a class="theme-item" href="../demo2/dashboard.html">
                        <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
                    </a>
                </div>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                        alt="profile">
                                </a>
                                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                        <div class="mb-3">
                                            <img class="wd-80 ht-80 rounded-circle"
                                                src="https://via.placeholder.com/80x80" alt="">
                                        </div>
                                        <div class="text-center">
                                            <p class="tx-16 fw-bolder">{{ auth()->user()->name }}</p>
                                            <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled p-1">
                                        <li class="dropdown-item py-2">
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item"><i class="me-2 icon-md"
                                                        data-feather="log-out"></i>Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/login"><i class="bi bi-box-arrow-in-right"
                                        style="font-size: 2rem; color: cornflowerblue;"></i></a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>

            @yield('admin')

            <!-- partial:partials/_footer.html -->
            <footer <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    <p>Made with <i class="fa fa-heart" aria-hidden="true" style="color:#be1931"></i> © 2023
                        Copyright:</p>
                    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">RyanEka</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="/../assets/vendors/core/core.js"></script>
    <!-- endinject -->

    @stack('scripts')

    <!-- Plugin js for this page -->
    {{-- <script src="/../assets/vendors/flatpickr/flatpickr.min.js"></script>
    <script src="/../assets/vendors/apexcharts/apexcharts.min.js"></script> --}}
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="/../assets/vendors/feather-icons/feather.min.js"></script>
    <script src="/../assets/js/template.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="/../assets/js/dashboard-light.js"></script>
    <!-- End custom js for this page -->

</body>

</html>
