
@extends('layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                <h3></h3>    
                <h3>P&nbsp;R&nbsp;I&nbsp;N&nbsp;T&nbsp; &nbsp;B&nbsp;U&nbsp;K&nbsp;U&nbsp;&nbsp; I&nbsp;C&nbsp;V</h3>
                   
                </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama / No.Passport</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Cover</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Halaman 6</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Halaman 10</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Halaman 12</th>
                  </tr>
                </thead>
                <tbody>
                 

                   @php
                       $no = 1;
                   @endphp
                    
                   @foreach ($bukuCetak as $d)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            @foreach($d->vaksinRegistrasis as $p)
                            <td>{{ $p->pasien->nama_pasien ?? 'N/A' }}&nbsp;&nbsp;({{ $p->no_reg ?? 'N/A' }})</td>
                            @endforeach
                            <td class="text-center">
                              <a class="btn {{ $d->print_cover === 'N' ? 'btn-danger' : 'btn-success' }}" 
                                href="{{ $d->print_cover === 'Y' ? '#' : 'vaksin_icv_cetak/cetakhal1/' . $d->id_rm }}" 
                                target="{{ $d->print_cover === 'Y' ? '_self' : '_blank' }}">
                                  <i class="fa fa-print"></i> {{ $d->print_cover === 'Y' ? 'sudah' : 'belum' }}
                              </a>
                          </td>
                          <td class="text-center">
                              <a class="btn {{ $d->print_cover === 'N' ? 'btn-danger' : 'btn-success' }}" 
                                href="{{ $d->print_cover === 'Y' ? '#' : 'vaksin_icv_cetak/cetakhal6/' . $d->id_rm }}" 
                                target="{{ $d->print_cover === 'Y' ? '_self' : '_blank' }}">
                                  <i class="fa fa-print"></i> {{ $d->print_cover === 'Y' ? 'sudah' : 'belum' }}
                              </a>
                          </td>
                          <td class="text-center">
                              <a class="btn {{ $d->print_cover === 'N' ? 'btn-danger' : 'btn-success' }}" 
                                href="{{ $d->print_cover === 'Y' ? '#' : 'vaksin_icv_cetak/cetakhal6/' . $d->id_rm }}" 
                                target="{{ $d->print_cover === 'Y' ? '_self' : '_blank' }}">
                                  <i class="fa fa-print"></i> {{ $d->print_cover === 'Y' ? 'sudah' : 'belum' }}
                              </a>
                          </td>
                          <td class="text-center">
                              <a class="btn {{ $d->print_cover === 'N' ? 'btn-danger' : 'btn-success' }}" 
                                href="{{ $d->print_cover === 'Y' ? '#' : 'vaksin_icv_cetak/cetakhal6/' . $d->id_rm }}" 
                                target="{{ $d->print_cover === 'Y' ? '_self' : '_blank' }}">
                                  <i class="fa fa-print"></i> {{ $d->print_cover === 'Y' ? 'sudah' : 'belum' }}
                              </a>
                          </td>
                        </tr>
                    @endforeach
            
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection