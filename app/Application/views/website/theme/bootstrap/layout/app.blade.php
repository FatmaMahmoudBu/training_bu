<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{trans('website.siteTitle')}} | @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="البوابة الإلكترونية لجامعة بنها">
    <meta name="contact" content="dev1@bu.edu.eg">
    <meta name="copyright" content="جامعة بنها">
    <meta name="distribution" content="global">
    <meta name="language" content="Arabic">
    <meta name="reply-to" content="dev1@bu.edu.eg">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('title')" />
    <meta property="og:image" content="https://bu.edu.eg/portal/uploads/NewsImgs/1557746227.jpg" />


    <!-- Vendor CSS Files -->
    <link href="{{ url('/') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    {{-- <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons Starts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Bootstrap Icons Ends -->


    <!-- Template Main CSS File -->
    <link href="@if(getDir() == 'rtl')  {{url('/assets/css/style_ar.css')}} @else {{url('/assets/css/style_en.css')}}  @endif" rel="stylesheet">



    {{-- Html::style('css/sweetalert.css') --}}

    <script>
        window.Laravel = {
            !!json_encode([
                'csrfToken' => csrf_token()
            , ]) !!
        };

    </script>
    @stack('css')
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
  @include(layoutMenu('website'))
  </header><!-- End Header -->

    {{-- @if(getDir() == 'rtl')
    @include('website/theme/bootstrap/layout/partials/menu_ar')
    @else
    @include('website/theme/bootstrap/layout/partials/menu_en')
    @endif --}}




    <main id="main">
        @include(layoutContent('website'))
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        @include(layoutFooter('website'))
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->

    <script src="{{ url('/') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ url('/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/venobox/venobox.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>


    <!-- Template Main JS File -->
    <script src="{{ url('/') }}/assets/js/main.js"></script>
    @stack('script')
</body>

</html>
