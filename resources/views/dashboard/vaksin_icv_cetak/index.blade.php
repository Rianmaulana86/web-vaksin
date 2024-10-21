
@extends('layouts.master')


@section('content')



<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Team table</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Passport</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cover</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hal.6</th>
                 
                  </tr>
                </thead>
                <tbody>
                   @if (count($bukucetak) > 0)

                   @php
                       $no = 1;
                   @endphp
                    
                    @foreach ($bukucetak as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->pasien->nama_pasien }}</td>
                            <td>{{ $d->pasien->no_passport }}</td>
                            <td>
                                <a class="btn {{ $d->print_cover === 'N' ? 'btn-danger' : 'btn-success' }}" 
                                  href="javascript:void(0);" 
                                  onclick="{{ $d->print_cover === 'Y' ? 'return false;' : 'window.open(\'vaksin_icv_cetak/cetakhal1/' . $d->id . '\', \'_blank\', \'width=320,height=320\');' }}">
                                    <i class="fa fa-print"></i> {{ $d->print_cover === 'Y' ? 'sudah' : 'belum' }}
                                </a>
                            </td>
                            <td>
                                <a class="btn {{ $d->print_cover === 'N' ? 'btn-danger' : 'btn-success' }}" 
                                  href="javascript:void(0);" 
                                  onclick="{{ $d->print_cover === 'Y' ? 'return false;' : 'window.open(\'vaksin_icv_cetak/cetakhal6/' . $d->id . '\', \'_blank\', \'width=320,height=320\');' }}">
                                    <i class="fa fa-print"></i> {{ $d->print_cover === 'Y' ? 'sudah' : 'belum' }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                   @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection