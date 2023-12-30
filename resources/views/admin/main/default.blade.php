<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.includes.head')
</head>

<body>
    <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.includes.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
           @include('admin.includes.right_sidebar')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
           @include('admin.includes.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('main-content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    @include('admin.includes.footer')
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

   @include('admin.includes.scripts')
</body>

</html>
