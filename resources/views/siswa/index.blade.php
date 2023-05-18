@extends('master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-12">

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="file" class="form-control" name="file" aria-label="Upload" />

                                    <button class="btn btn-outline-primary" type="submit">
                                        <i class="fas fa-upload me-1"></i> Import
                                    </button>
                                </div>
                                <small class="text-danger">*File harus berupa .xls dan .xlsx</small>
                            </form>
                        </div>

                        <div class="col-lg-7 col-md-7">
                            <div class="input-group">
                                <a href="{{ asset('assets/files/format.csv') }}" class="btn btn-outline-success mb-3"
                                    download>
                                    <i class="fas fa-download me-1"></i> Format Excel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hoverable Table rows -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Nopes</th>
                                    <th>Absen</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Hp Ortu</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($data as $siswa)
                                    <tr>
                                        <input type="hidden" name="id" value="id_siswa">
                                        <td>
                                            <span class="badge bg-label-dark">
                                                {{ $siswa->nopes }}
                                            </span>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $siswa->absen }}
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $siswa->nama }}
                                        </td>
                                        <td>{{ $siswa->kelas }}</td>
                                        <td>
                                            <span class="badge bg-label-dark">
                                                {{ $siswa->hp_ortu }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Hoverable Table rows -->
        </div>
    </div>
@endsection
