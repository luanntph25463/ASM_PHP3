@include('admin.layouts.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.aside')

        </div>

        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            @include('admin.layouts.nav')
            @include('admin.layouts.error')
            @yield('content')
        </div>

    </div>

  @include('admin.layouts.footer')
  @yield('script')
</body>
</html>
