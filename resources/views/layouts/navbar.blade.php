<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <div class="d-flex align-items-center">
                    <span class="badge badge-dot bg-success me-2"></span>
                    <div id="MyClockDisplay" onload="showTime()"></div>
                </div>
            </div>
        </div>

        <script>
            function showTime() {
                var date = new Date();
                var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var session = "AM";

                if (h == 0) {
                    h = 12;
                }

                if (h > 12) {
                    h = h - 12;
                    session = "PM";
                }

                h = h < 10 ? "0" + h : h;
                m = m < 10 ? "0" + m : m;
                s = s < 10 ? "0" + s : s;

                var time = h + ":" + m + ":" + s + " " + session;
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent = time;

                setTimeout(showTime, 1000);
            }

            showTime();
        </script>
        <!-- /Search -->

        <ul class="navbar-nav
                        flex-row align-items-center ms-auto">
            <!-- Style Switcher -->
            <li class="nav-item me-2 me-xl-0">
                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                    <i class="ti ti-md"></i>
                </a>
            </li>
            <!--/ Style Switcher -->

            @if (Auth::user()->role == 'Wali Murid')
                <!-- Notification -->
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        <i class="ti ti-bell ti-md"></i>

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

                        <span class="badge bg-danger rounded-pill badge-notifications">
                            {{ $notificationCount }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end py-0">
                        <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h5 class="text-body mb-0 me-auto">Notifikasi</h5>
                                <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tandai telah dibaca"><i
                                        class="ti ti-checks fs-4"></i></a>
                            </div>
                        </li>
                        <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                                @php
                                    $sortedData = $data->sortByDesc('waktu');
                                @endphp
                                @foreach ($sortedData as $notif)
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
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="assets/img/avatars/1.png" alt
                                                            class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{ $notif->username }}</h6>
                                                    <p class="mb-0">{{ $notif->judul }} dalam pelajaran
                                                        {{ $notif->mapel }}</p>
                                                    <small class="text-muted">
                                                        {{ $waktuTeks }}
                                                    </small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)"
                                                        class="dropdown-notifications-read"><span
                                                            class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)"
                                                        class="dropdown-notifications-archive"><span
                                                            class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown-menu-footer border-top">
                            <a href="{{ url('notifikasi') }}"
                                class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                Tampilkan Semua Notifikasi
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Notification -->
            @endif

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->user()->username }}</span>
                                    <small class="text-muted">{{ auth()->user()->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-profile-user.html">
                            <i class="ti ti-user me-2 ti-sm"></i>
                            <span class="align-middle">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Pengaturan</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form id="formLogout" action="logout" method="post" enctype="multipart/form-data">
                            @csrf
                            <a class="dropdown-item text-danger" type="button"
                                onclick="document.getElementById('formLogout').submit()">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Keluar</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
