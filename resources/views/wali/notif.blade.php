@extends('master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-email card">
            <div class="row g-0">
                <!-- Email Sidebar -->
                <div class="col app-email-sidebar border-end flex-grow-0" id="app-email-sidebar">
                    <!-- Email Filters -->
                    <div class="email-filters py-3">
                        <!-- Email Filters: Folder -->
                        <ul class="email-filter-folders list-unstyled mb-4">
                            <li class="active d-flex justify-content-between" data-target="inbox">
                                <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                                    <i class="ti ti-mail"></i>
                                    <span class="align-middle ms-2">Kotak Masuk</span>
                                </a>
                                @php
                                    $notificationCount = 0;
                                @endphp

                                @foreach ($data as $notif)
                                    @if ($notif->nama === auth()->user()->username)
                                        @php
                                            $notificationCount++;
                                        @endphp
                                    @endif
                                @endforeach

                                <div class="badge bg-label-primary rounded-pill badge-center">
                                    {{ $notificationCount }}
                                </div>
                            </li>
                            <li class="d-flex align-items-center" data-target="trash">
                                <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                                    <i class="ti ti-trash text-danger"></i>
                                    <span class="align-middle ms-2">Sampah</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Email Sidebar -->

                <!-- Emails List -->
                <div class="col app-emails-list">
                    <div class="shadow-none border-0">
                        <div class="emails-list-header p-3 py-lg-3 py-2">
                            <!-- Email List: Search -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center w-100">
                                    <i class="ti ti-menu-2 ti-sm cursor-pointer d-block d-lg-none me-3"
                                        data-bs-toggle="sidebar" data-target="#app-email-sidebar" data-overlay></i>
                                    <div class="mb-0 mb-lg-2 w-100">
                                        <div class="input-group input-group-merge shadow-none">
                                            <span class="input-group-text border-0 ps-0" id="email-search">
                                                <i class="ti ti-search"></i>
                                            </span>
                                            <input type="text" class="form-control email-search-input border-0"
                                                placeholder="Cari Notifikasi" aria-label="Cari Notifikasi"
                                                aria-describedby="email-search" />
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-0 mb-md-2">
                                    <i
                                        class="ti ti-rotate-clockwise rotate-180 scaleX-n1-rtl cursor-pointer email-refresh me-2 mt-1"></i>
                                    <div class="dropdown d-flex align-self-center">
                                        <button class="btn p-0" type="button" id="emailsActions" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="emailsActions">
                                            <a class="dropdown-item" href="javascript:void(0)">Tandai telah dibaca</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Belum dibaca</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-n3 emails-list-header-hr" />
                            <!-- Email List: Actions -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="form-check mb-0 me-2">
                                        <input class="form-check-input" type="checkbox" id="email-select-all" />
                                        <label class="form-check-label" for="email-select-all"></label>
                                    </div>
                                    <i class="ti ti-trash text-danger email-list-delete cursor-pointer me-2"></i>
                                </div>
                            </div>
                        </div>
                        <hr class="container-m-nx m-0" />
                        <!-- Email List: Items -->
                        <div class="email-list pt-0">
                            @foreach ($data as $notif)
                                @php
                                    $waktuNotifikasi = \Carbon\Carbon::parse($notif->waktu)->format('H:i');
                                    $waktuSekarang = \Carbon\Carbon::now()->tz('Asia/Jakarta');
                                    $selisihMenit = $waktuSekarang->diffInMinutes($waktuNotifikasi);
                                    $waktuTeks = '';
                                    
                                    if ($selisihMenit < 1) {
                                        $waktuTeks = 'baru saja';
                                    } elseif ($selisihMenit < 60) {
                                        $waktuTeks = $selisihMenit . ' menit yang lalu';
                                    } elseif ($selisihMenit < 60 * 24) {
                                        $selisihJam = $waktuSekarang->diffInHours($waktuNotifikasi);
                                        $waktuTeks = $selisihJam . ' jam yang lalu';
                                    } elseif ($selisihMenit < 60 * 24 * 30) {
                                        $selisihHari = $waktuSekarang->diffInDays($waktuNotifikasi);
                                        $waktuTeks = $selisihHari . ' hari yang lalu';
                                    } elseif ($selisihMenit < 60 * 24 * 30 * 12) {
                                        $selisihBulan = $waktuSekarang->diffInMonths($waktuNotifikasi);
                                        $waktuTeks = $selisihBulan . ' bulan yang lalu';
                                    } else {
                                        $selisihTahun = $waktuSekarang->diffInYears($waktuNotifikasi);
                                        $waktuTeks = $selisihTahun . ' tahun yang lalu';
                                    }
                                @endphp

                                @if ($notif->nama === auth()->user()->username)
                                    <ul class="list-unstyled m-0">
                                        <li class="email-list-item" data-starred="true" data-bs-toggle="sidebar"
                                            data-target="#app-email-view">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check mb-0">
                                                    <input class="email-list-item-input form-check-input" type="checkbox"
                                                        id="email-1" />
                                                    <label class="form-check-label" for="email-1"></label>
                                                </div>
                                                <img src="assets/img/avatars/1.png" alt="user-avatar"
                                                    class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32"
                                                    width="32" />
                                                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                                                    <span class="h6 email-list-item-username me-2">{{ $notif->username }}
                                                        |
                                                        {{ $notif->role }}</span>
                                                    <span
                                                        class="email-list-item-subject d-xl-inline-block d-block">{{ $notif->judul }}</span>
                                                </div>
                                                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                                                    <small class="email-list-item-time text-muted">
                                                        {{ $waktuTeks }}
                                                    </small>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="app-overlay"></div>
                </div>
                <!-- /Emails List -->

                <!-- Email View -->
                <div class="col app-email-view flex-grow-0 bg-body" id="app-email-view">
                    @php
                        $notif = $data->where('nama', auth()->user()->username)->first();
                    @endphp

                    @if ($notif)
                        <div class="card shadow-none border-0 rounded-0 app-email-view-header p-3 py-md-3 py-2">
                            <!-- Email View : Title  bar-->
                            <div class="d-flex justify-content-between align-items-center py-2">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <i class="ti ti-chevron-left ti-sm cursor-pointer me-2" data-bs-toggle="sidebar"
                                        data-target="#app-email-view"></i>
                                    <h6 class="text-truncate mb-0 me-2">{{ $notif->judul }}</h6>
                                    <span class="badge bg-label-success rounded-pill">Notifikasi</span>
                                </div>
                                <!-- Email View : Action  bar-->
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-trash text-danger mt-1 cursor-pointer d-sm-block d-none"></i>
                                    <div class="dropdown ms-3">
                                        <button class="btn p-0" type="button" id="dropdownMoreOptions"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMoreOptions">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="ti ti-checks ti-xs me-1"></i>
                                                <span class="align-middle">Tandai telah dibaca</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="ti ti-mail-opened ti-xs me-1"></i>
                                                <span class="align-middle">Belum dibaca</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0" />
                        <!-- Email View : Content-->
                        <div class="app-email-view-content py-4">
                            <!-- Email View : Last mail-->
                            <div class="card email-card-last mx-sm-4 mx-3 mt-4">
                                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex align-items-center mb-sm-0 mb-3">
                                        <img src="assets/img/avatars/1.png" alt="user-avatar"
                                            class="flex-shrink-0 rounded-circle me-3" height="40" width="40" />
                                        <div class="flex-grow-1 ms-1">
                                            <h6 class="m-0">{{ $notif->username }}</h6>
                                            <small class="text-muted">{{ $notif->role }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3 text-muted">{{ $notif->waktu }}</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>{{ $notif->deskripsi }}</p>
                                    <p class="mb-0">Salam hangat,</p>
                                    <p class="fw-bold mb-0">{{ $notif->username }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Email View -->
            </div>
        </div>
    </div>
@endsection
