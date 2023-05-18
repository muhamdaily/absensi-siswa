@extends('master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <div class="col-12">
                <!-- Search -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select id="kelas" class="select2 form-select form-select-lg">
                                    <option selected disabled>Pilih Kelas</option>
                                    @foreach ($data as $siswa)
                                        <option value="{{ $siswa->kelas }}">{{ $siswa->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="bs-datepicker-basic" class="form-label">Tanggal</label>
                                <input type="date" id="bs-datepicker-basic" name="waktu" placeholder="MM/DD/YYYY"
                                    class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label for="Guru" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="Guru" name="username"
                                    value="{{ auth()->user()->username }}" readonly />
                            </div>

                            <div class="col-md-3">
                                <label for="mapel" class="form-label">Mata Pelajaran</label>
                                <select id="mapel" name="mapel" class="select2 form-select form-select-lg">
                                    <option selected disabled>Pilih Mata Pelajaran</option>
                                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="Kewarganegaraan">Kewarganegaraan</option>
                                    <option value="Sejarah">Sejarah</option>
                                    <option value="Fisika">Fisika</option>
                                    <option value="Biologi">Biologi</option>
                                    <option value="Kimia">Kimia</option>
                                </select>
                            </div>

                            <div class="col-md-2 mt-4">
                                <button class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search -->

                <!-- Hoverable Table rows -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Absen</th>
                                        <th>Induk</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Hp Ortu</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="siswaTable">
                                    @foreach ($data as $siswa)
                                        <tr>
                                            <input type="hidden" name="id_siswa[]" value="{{ $siswa->id }}">
                                            <td>
                                                <strong>
                                                    {{ $siswa->absen }}
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="badge bg-label-dark">
                                                    {{ $siswa->nopes }}
                                                </span>
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
                                            <td>
                                                <select class="selectpicker w-100" name="keterangan"
                                                    data-style="btn-default">
                                                    <option selected value="Masuk">Masuk</option>
                                                    <option value="Izin">Izin</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Alpha">Alpha</option>
                                                    <option value="Terlambat">Terlambat</option>
                                                    <option value="Pulang">Pulang</option>
                                                </select>
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
        </form>
    </div>
@endsection
