@extends('master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-12">
            <!-- Hoverable Table rows -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Waktu</th>
                                    <th>Nama Siswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            @php
                                $sortedItems = $item->sortByDesc('waktu');
                            @endphp

                            <tbody class="table-border-bottom-0">
                                @foreach ($sortedItems as $absensi)
                                    @php
                                        $waktu = $absensi->waktu;
                                        $tanggal = date('d F Y', strtotime($waktu));
                                        $jam = date('H:i', strtotime($waktu));
                                        $hariIndonesia = [
                                            'Sunday' => 'Minggu',
                                            'Monday' => 'Senin',
                                            'Tuesday' => 'Selasa',
                                            'Wednesday' => 'Rabu',
                                            'Thursday' => 'Kamis',
                                            'Friday' => 'Jumat',
                                            'Saturday' => 'Sabtu',
                                        ];
                                        $bulanIndonesia = [
                                            'January' => 'Januari',
                                            'February' => 'Februari',
                                            'March' => 'Maret',
                                            'April' => 'April',
                                            'May' => 'Mei',
                                            'June' => 'Juni',
                                            'July' => 'Juli',
                                            'August' => 'Agustus',
                                            'September' => 'September',
                                            'October' => 'Oktober',
                                            'November' => 'November',
                                            'December' => 'Desember',
                                        ];
                                        $hari = $hariIndonesia[date('l', strtotime($waktu))];
                                        $bulan = $bulanIndonesia[date('F', strtotime($waktu))];
                                        $hasil = $hari . ', ' . date('d', strtotime($waktu)) . ' ' . $bulan . ' ' . date('Y', strtotime($waktu)) . ' - Jam ' . $jam;
                                    @endphp
                                    @if ($absensi->siswa->nama === auth()->user()->username)
                                        <tr>
                                            <td>{{ $absensi->username }}</td>
                                            <td>{{ $absensi->mapel }}</td>
                                            <td>
                                                {{ $hasil }}
                                            </td>
                                            <td>{{ $absensi->siswa->nama }}</td>
                                            <td>{{ $absensi->keterangan }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!--/ Hoverable Table rows -->
        </div>
    </div>
    <!-- / Content -->
@endsection
