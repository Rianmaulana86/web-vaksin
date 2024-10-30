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


      <!-- Registrasi -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/kasir') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-cash-register text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Kasir</span>
        </a>
      </li>

       
   

         <!-- Registrasi -->
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
            <!-- Master Dokter -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpenjualan') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-money-coins  text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Penjualan Vaksin</span>
              </a>
            </li>   

            <!-- Master Jenis Vaksinasi -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpembelian') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-cart text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pembelian Vaksin</span>
              </a>
            </li>

         
          </ul>
        </div>
      </li> 
           <!-- Dropdown Master Data -->
      <li class="nav-item">
        <a class="nav-link" href="#masterDataMenuMasterData" data-bs-toggle="collapse" aria-expanded="false">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-folder-17 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Master Data</span>
        </a>
        <div class="collapse" id="masterDataMenuMasterData">
          <ul class="nav ms-4">
            <!-- Master Dokter -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dokter') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Nakes</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinmaster') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Vaksin (Distributor)</span>
              </a>
            </li>

            <!-- Master Vaksin Tambahan -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpaket') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Harga & Jasa Medis </span>
              </a>
            </li>
            <!-- Master Jenis Vaksinasi -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksin') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Jenis Vaksinasi</span>
              </a>
            </li>

            <!-- Master Vaksin Tambahan -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpaket') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Paket Vaksinasi</span>
              </a>
            </li>

            <!-- Master Travel -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/travel') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Travel</span>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/#') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Setting</span>
              </a>
            </li>
          
          </ul>
        </div>
      </li>
      @endif

     

    </ul>
  </div>
</aside>