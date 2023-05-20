@extends('master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <div class="col-12">

                <div class="row">
                    <!-- [Search] Start -->
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <!-- [Pilih Kelas] Start -->
                                    <div class="col-md-12">
                                        <label for="kelas" class="form-label">
                                            Kelas (<small class="text-danger">wajib dipilih</small>)
                                        </label>
                                        <select id="kelas" class="select2 form-select form-select-lg"
                                            onchange="searchByClass()">
                                            <option selected disabled>Pilih Kelas</option>
                                            <option value="X TP 1">X TP 1</option>
                                            <option value="X TP 2">X TP 2</option>
                                            <option value="X TP 3">X TP 3</option>
                                            <option value="X TP 4">X TP 4</option>
                                            <option value="X TP 5">X TP 5</option>

                                            <option value="XI TL 1">XI TL 1</option>
                                            <option value="XI TL 2">XI TL 2</option>

                                            <option value="XI TP 1">XI TP 1</option>
                                            <option value="XI TP 2">XI TP 2</option>
                                            <option value="XI TP 3">XI TP 3</option>
                                            <option value="XI TP 4">XI TP 4</option>

                                            <option value="XII TL">XII TL</option>
                                            <option value="XII TP 1">XII TP 1</option>
                                            <option value="XII TP 2">XII TP 2</option>
                                            <option value="XII TP 3">XII TP 3</option>
                                        </select>
                                    </div>
                                    <!-- [Pilih Kelas] End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Search] End -->

                    <div class="col-md-9">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <!-- [Tanggal] Start -->
                                    <div class="col-md-3">
                                        <label for="bs-datepicker-basic" class="form-label">Tanggal</label>
                                        <input type="date" id="bs-datepicker-basic" name="waktu"
                                            placeholder="MM/DD/YYYY" class="form-control" />
                                    </div>
                                    <!-- [Tanggal] End -->

                                    <!-- [Nama Guru] Start -->
                                    <div class="col-md-4">
                                        <label for="Guru" class="form-label">Nama Guru</label>
                                        <input type="text" class="form-control" id="Guru" name="username"
                                            value="{{ auth()->user()->username }}" readonly />
                                    </div>
                                    <!-- [Nama Guru] End -->

                                    <!-- [Mapel] Start -->
                                    <div class="col-md-3">
                                        <label for="mapel" class="form-label">Mata Pelajaran</label>
                                        <select id="mapel" name="mapel" class="select2 form-select form-select-lg">
                                            <option selected disabled>Pilih Mapel</option>
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
                                    <!-- [Mapel] End -->

                                    <div class="col-md-2 mt-4">
                                        <button class="btn btn-success">
                                            <i class="fas fa-save me-1"></i> Simpan
                                        </button>
                                    </div>
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
                                        <th>Absen</th>
                                        <th>Induk</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Hp Ortu</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="siswaTable" data-empty="true">
                                    <tr id="emptyRow">
                                        <td colspan="6">
                                            <div class="text-center">
                                                <div id="pesan" class="mt-3"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach ($data as $index => $siswa)
                                        <tr class="siswaRow">
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
                                                <select class="selectpicker w-100" name="keterangan[{{ $index }}]"
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
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
                <!--/ Hoverable Table rows -->
            </div>
        </form>
    </div>

    <script>
        function searchByClass() {
            var selectedClass = document.getElementById("kelas").value; // Mendapatkan nilai kelas yang dipilih
            var tableBody = document.getElementById("siswaTable"); // Mendapatkan elemen tbody
            var emptyRow = document.getElementById("emptyRow"); // Mendapatkan elemen baris kosong
            var pesan = document.getElementById("pesan"); // Mendapatkan elemen pesan

            // Jika kelas belum dipilih
            if (selectedClass === "") {
                tableBody.setAttribute("data-empty", "true"); // Menandai bahwa tbody kosong
                emptyRow.style.display = ""; // Menampilkan baris kosong dengan pesan
                pesan.innerHTML = "Silahkan pilih kelas terlebih dahulu.";
                return;
            } else {
                emptyRow.style.display = "none"; // Menyembunyikan baris kosong dengan pesan
            }

            var rows = document.getElementsByClassName("siswaRow");
            var found = false;

            // Memeriksa setiap baris siswa
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");

                // Memeriksa kelas siswa pada kolom ke-4 (indeks 3)
                var kelas = cells[3].innerText || cells[3].textContent;

                // Jika kelas siswa sesuai dengan kelas yang dipilih
                if (kelas === selectedClass) {
                    rows[i].style.display = ""; // Menampilkan baris siswa
                    found = true;
                } else {
                    rows[i].style.display = "none"; // Menyembunyikan baris siswa yang tidak sesuai
                }
            }

            // Jika tidak ada data kelas yang sesuai
            if (!found) {
                tableBody.setAttribute("data-empty", "true"); // Menandai bahwa tbody kosong
                emptyRow.style.display = ""; // Menampilkan baris kosong dengan pesan
                pesan.innerHTML =
                    "Data siswa dari kelas yang kamu pilih tidak ada, silahkan pilih kelas lain untuk ditampilkan data siswanya.";
            } else {
                tableBody.setAttribute("data-empty", "false"); // Menandai bahwa tbody berisi data
                pesan.innerHTML = ""; // Menghapus pesan jika data kelas sesuai ditemukan
            }
        }

        // Memanggil fungsi searchByClass saat halaman selesai dimuat
        window.addEventListener("load", searchByClass);
    </script>
@endsection
