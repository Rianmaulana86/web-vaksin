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
        <a class="nav-link active" href="{{ url('/dashboard') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">DASHBOARD</span>
        </a>
      </li>



    
      <!-- Registrasi -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/vaksin_registrasis') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-badge text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">VAKSINASI</span>
        </a>
      </li>

        <!-- Pasien -->
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/pasien') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">PASIEN</span>
        </a>
      </li>


      <!-- Registrasi -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/kasir') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-badge text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">KASIR</span>
        </a>
      </li>

    

      @if (Auth::user()->is_admin == 1)

      <li class="nav-item">
        <a class="nav-link" href="#masterDataMenuVaksin" data-bs-toggle="collapse" aria-expanded="false">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-folder-17 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">VAKSIN</span>
        </a>
        <div class="collapse" id="masterDataMenuVaksin">
          <ul class="nav ms-4">
            <!-- Master Dokter -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpenjualan') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Penjualan Vaksin</span>
              </a>
            </li> 

            <!-- Master Jenis Vaksinasi -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpembelian') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pembelian Vaksin</span>
              </a>
            </li>

            <!-- Master Vaksin Tambahan -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpaket') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">STOK & HARGA VAKSIN</span>
              </a>
            </li>

            <!-- Master Travel -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/travel') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-bus-front-12 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">MASTER DATA VAKSIN</span>
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
          <span class="nav-link-text ms-1">MASTER DATA</span>
        </a>
        <div class="collapse" id="masterDataMenuMasterData">
          <ul class="nav ms-4">
            <!-- Master Dokter -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dokter') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">TENAGA KESEHATAN</span>
              </a>
            </li>

            <!-- Master Jenis Vaksinasi -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksin') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">JENIS VAKSINASI</span>
              </a>
            </li>

            <!-- Master Vaksin Tambahan -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/vaksinpaket') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-check-bold text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">PAKET ISI VAKSIN</span>
              </a>
            </li>

            <!-- Master Travel -->
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/travel') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-bus-front-12 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Travel</span>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/#') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-bus-front-12 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">VAKSIN</span>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/#') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-bus-front-12 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">SETTING</span>
              </a>
            </li>
          
          </ul>
        </div>
      </li>
      @endif

     

    </ul>
  </div>
</aside>
