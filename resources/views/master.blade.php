<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="description" content="Jasa Pembuatan Website Dan Aplikasi Terpercaya dan Profesional">
    <meta name="keywords"
        content="Jasa pembuatan website indonesia, Jasa Pembuatan website Jember, Jasa Pembuatan aplikasi, Jasa Pembuatan aplikasi murah, Jasa Pembuatan aplikasi profesional, Jasa Pembuatan website Profesional, Jasa Pembuatan website murah, It Konsultan Terpercaya">
    <meta name="author" content="Mentari Teknologi Digital">
    <meta property="og:title" content="Mentari Teknologi Digital">
    <meta property="og:description" content="Jasa Pembuatan Website Dan Aplikasi Terpercaya dan Profesional">
    <meta property="og:image" content="https://www.mentariteknologidigital.com/storage/setting/vPFktJMJcU5CFuvB.png">
    <meta property="og:url" content="https://absensi.anteiku.tech">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mentari Teknologi Digital">
    <meta name="twitter:description" content="Jasa Pembuatan Website Dan Aplikasi Terpercaya dan Profesional">
    <meta name="twitter:image" content="https://www.mentariteknologidigital.com/storage/setting/vPFktJMJcU5CFuvB.png">

    @if (auth()->user()->role === 'Guru')
        <title>Dashboard | Guru</title>
    @else
        <title>Home | Wali Murid</title>
    @endif

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    @include('layouts.links')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('layouts.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    @include('layouts.scripts')
</body>

</html>
