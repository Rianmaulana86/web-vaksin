<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html" target="_blank">
      <span class="ms-1 font-weight-bold">APLIKASI CETAK BUKU ICV</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" style="height: 100%;" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item">
      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-tachometer-alt text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <!-- Pasien -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/pasien') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pasien</span>
        </a>
      </li>

      <!-- Registrasi -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/vaksin_registrasis') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-syringe text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Registrasi & Proses</span>
        </a>
      </li>

      <!-- Kasir -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/kasir') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-cash-register text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Kasir</span>
        </a>
      </li>

      <!-- Cetak Buku ICV -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/vaksin_icv_cetak') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-print text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Cetak Buku ICV</span>
        </a>
      </li>

      @if (Auth::user()->is_admin == 1)
      <li class="nav-item">
  <a class="nav-link" href="#masterDataMenuVaksin" data-bs-toggle="collapse" aria-expanded="false">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
      <i class="ni ni-folder-17 text-primary text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Transaksi</span>
  </a>
  <div class="collapse" id="masterDataMenuVaksin">
    <ul class="nav ms-4">
      <li class="nav-item">
        <a class="nav-link vaksin-link" href="{{ url('/vaksinpenjualan') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-money-coins text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Penjualan Vaksin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link vaksin-link" href="{{ url('/vaksinpembelian') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-cart text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pembelian Vaksin</span>
        </a>
      </li>
    </ul>
  </div>
</li>

      <!-- Master Data -->
      <li class="nav-item">
        <a class="nav-link" href="#masterDataMenuMasterData" data-bs-toggle="collapse" aria-expanded="false">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-folder-17 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Master Data</span>
        </a>
        <div class="collapse" id="masterDataMenuMasterData">
          <ul class="nav ms-4">
            <li class="nav-item">
              <a class="nav-link nakes-link" href="{{ url('/dokter') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Nakes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nakes-link" href="{{ url('/vaksinmaster') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Vaksin (Distributor)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nakes-link" href="{{ url('/vaksinpaket') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Harga & Jasa Medis</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nakes-link" href="{{ url('/vaksin') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Jenis Vaksinasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nakes-link" href="{{ url('/vaksinpaket1') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Paket Vaksinasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nakes-link " href="{{ url('/travel') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Travel</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif
    </ul>
  </div>
</aside>

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
