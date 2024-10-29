

@include('layouts.header')


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  @include('layouts.sidebar')
    

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- End Navbar -->

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
  @endif

  @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif


    @yield('content')


    @include('layouts/footer')

  </main>
 

  
  <!--   Core JS Files   -->
  <script src="{{ asset('assets_be/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets_be/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets_be/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets_be/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets_be/js/plugins/chartjs.min.js') }}"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets_be/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>