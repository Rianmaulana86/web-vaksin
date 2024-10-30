

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

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.nav-link');
    const masterDataMenu = document.querySelector('#masterDataMenuMasterData');
    const nakesLink = document.querySelector('.nakes-link');
    const transaksiMenu = document.querySelector('#masterDataMenuVaksin');

    links.forEach(link => {
        link.addEventListener('click', function() {
            // Remove 'active' class and reset color from all links
            links.forEach(l => {
                l.classList.remove('active');
                l.style.color = ''; // Reset color
            });

            // Add 'active' class to the clicked link
            this.classList.add('active');
            this.style.color = 'red'; // Change color to red for the active link

            // Close all dropdowns
            const collapses = document.querySelectorAll('.collapse');
            collapses.forEach(collapse => {
                collapse.classList.remove('show');
            });

            // Open the clicked link's dropdown if it has one
            const collapseId = this.getAttribute('data-bs-target');
            if (collapseId) {
                const collapseElement = document.querySelector(collapseId);
                if (collapseElement) {
                    collapseElement.classList.toggle('show');
                }
            }

            // Keep the Master Data menu open if "Nakes" is clicked
            if (this === nakesLink) {
                if (masterDataMenu) {
                    masterDataMenu.classList.add('show'); // Keep the Master Data dropdown open
                }
            }

            // Keep the Transaksi menu open if "Penjualan" or "Pembelian" is clicked
            if (this.classList.contains('vaksin-link')) {
                if (transaksiMenu) {
                    transaksiMenu.classList.add('show'); // Keep the Transaksi dropdown open
                }
            }
        });
    });

    // Check if the current page matches any menu link and activate it
    const currentUrl = window.location.href;
    links.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add('active');
            link.style.color = 'red'; // Change color to red for the active link
            const collapseId = link.getAttribute('data-bs-target');
            if (collapseId) {
                const collapseElement = document.querySelector(collapseId);
                if (collapseElement) {
                    collapseElement.classList.add('show');
                }
            }
            // Keep the Master Data menu open if the active link is Nakes
            if (link.classList.contains('nakes-link')) {
                if (masterDataMenu) {
                    masterDataMenu.classList.add('show'); // Keep the Master Data dropdown open
                }
            }
            // Keep the Transaksi menu open if the active link is Penjualan or Pembelian
            if (link.classList.contains('vaksin-link')) {
                if (transaksiMenu) {
                    transaksiMenu.classList.add('show'); // Keep the Transaksi dropdown open
                }
            }
        }
    });
});
</script>
