<!DOCTYPE html>

<html lang="en">

@include('includes.head')

<body class="sidebar-mini layout-fixed" style="height: auto;">

<div class="wrapper">
    @include('includes.navbar')

    @include('includes.sidebar')

    @yield('content')

    @include('includes.footer')
</div>
<!-- ./wrapper -->
</body>
@include('includes.foot')
</html>
