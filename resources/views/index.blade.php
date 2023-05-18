@extends('master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- View sales -->
            <div class="col-xl-12 mb-4 col-lg-12 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title">Selamat Datang, {{ auth()->user()->username }}! 🎉</h5>
                                <p>Anda berhasil login sebagai <b>{{ auth()->user()->role }}</b></p>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/img/illustrations/boy-verify-email-dark.png') }}" height="140"
                                    alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View sales -->

            <!-- Cards with few info -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">1615 <span>Pengguna</span></h5>
                            <small>Total Pengguna</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">1.600 <span>Siswa</span></h5>
                            <small>Total Siswa</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-warning rounded-pill p-2">
                                <i class="ti ti-school ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">15 <span>Guru</span></h5>
                            <small>Total Guru</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-danger rounded-pill p-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">Rp.10.000.000</h5>
                            <small>Total Keuangan</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cards with few info -->

        </div>
    </div>
@endsection
