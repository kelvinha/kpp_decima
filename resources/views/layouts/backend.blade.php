@include('partisi.header')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('partisi.navbar')
        @include('partisi.sidebar')

        <div class="content-wrapper">

            @yield('content')

        </div>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

        @include('partisi.footer')
    </div>

    @include('partisi.js')
</body>

</html>
