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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&family=Work+Sans&display=swap"
        rel="stylesheet">

    <!-- End fonts -->

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- core:css -->
    <link rel="stylesheet" href="/../assets/css/demo3/style.min.css">
    <link rel="stylesheet" href="/../assets/css/responsive.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="../assets/vendors/flatpickr/flatpickr.min.css"> --}}
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
    {{-- <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css"> --}}
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo3/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body style="background-color: #F6F1F1; font-family: 'Roboto Mono', monospace;
font-family: 'Work Sans', sans-serif;">
    <div class="main-wrapper">

        <!-- partial:partials/_navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar">
                <div class="container">
                    <div class="navbar-content">
                        <a href="/" class="navbar-brand">
                            Baca<span>IN</span>
                        </a>
                        <form class="search-form" role="search" action="/posts">
                            @if (Request('category'))
                                <input type="hidden" name="category" value="{{ Request('category') }}">
                            @endif
                            @if (Request('user'))
                                <input type="hidden" name="user" value="{{ Request('user') }}">
                            @endif
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i data-feather="search"></i>
                                </div>
                                <input type="text" class="form-control" id="navbarForm" placeholder="Search here..."
                                    name="search" value="{{ Request('search') }}"">
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="wd-30 ht-30 rounded-circle" src="/assets/images/profile.png"
                                            alt="profile">
                                    </a>
                                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                            <div class="mb-3">
                                                <img class="wd-80 ht-80 rounded-circle" src="/assets/images/profile.png"
                                                    alt="">
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
                                    <a class="btn btn-outline-primary" href="/login" role="button">Login</a>
                                </li>
                            @endauth
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <i data-feather="menu"></i>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="link-icon" data-feather="home"></i>
                                <span class="menu-title">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kategori" class="nav-link">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="menu-title">Kategori</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link"
                                            href="pages/email/inbox.html">Laravel</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="pages/email/read.html">Golang</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="pages/email/compose.html">Java</a>
                                    </li>
                                    <li>
                                    <li class="nav-item"><a class="nav-link" href="pages/apps/chat.html">Java
                                            Script</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="pages/apps/calendar.html">C++</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/posts" class="nav-link">
                                <i class="link-icon" data-feather="book-open"></i>
                                <span class="menu-title">Artikel</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank"
                                class="nav-link">
                                <i class="link-icon" data-feather="inbox"></i>
                                <span class="menu-title">Contact Me</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- partial -->
        @yield('isi')
    </div>

    <!-- core:js -->
    <script src="../assets/vendors/core/core.js"></script>
    <!-- endinject -->

    @stack('ckeditor')

    <!-- Plugin js for this page -->
    {{-- <script src="../assets/vendors/flatpickr/flatpickr.min.js"></script> --}}
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="../assets/vendors/feather-icons/feather.min.js"></script>
    <script src="../assets/js/template.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard-light.js"></script>
    <!-- End custom js for this page -->

</body>
<!-- Footer -->
<footer class="text-center text-lg-start text-muted" style="background-color: #F6F1F1">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center p-4 border-bottom">

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/OctavianoRyan25" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: #F6F1F1">
        <p>Made with <i class="fa fa-heart" aria-hidden="true" style="color:#be1931"></i> © 2023 Copyright:</p>
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

</html>
