<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                    <i class="ti ti-search ti-md me-2"></i>
                    <span class="d-none d-md-inline-block text-muted">Cari...</span>
                </a>
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
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
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="ti ti-bell ti-md"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notifikasi</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Tandai telah dibaca"><i class="ti ti-checks fs-4"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                        <p class="mb-0">Won the monthly best seller gold badge</p>
                                        <small class="text-muted">1h ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Charles Franklin</h6>
                                        <p class="mb-0">Accepted your connection</p>
                                        <small class="text-muted">12hr ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="assets/img/avatars/2.png" alt class="h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">New Message ✉️</h6>
                                        <p class="mb-0">You have new message from Natalie</p>
                                        <small class="text-muted">1h ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-shopping-cart"></i></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                                        <p class="mb-0">ACME Inc. made new order $1,154</p>
                                        <small class="text-muted">1 day ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="assets/img/avatars/9.png" alt class="h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Application has been approved 🚀</h6>
                                        <p class="mb-0">Your ABC project application has been approved.</p>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-chart-pie"></i></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Monthly report is generated</h6>
                                        <p class="mb-0">July monthly financial report is generated</p>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="assets/img/avatars/5.png" alt class="h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Send connection request</h6>
                                        <p class="mb-0">Peter sent you connection request</p>
                                        <small class="text-muted">4 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="assets/img/avatars/6.png" alt class="h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">New message from Jane</h6>
                                        <p class="mb-0">Your have new message from Jane</p>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-alert-triangle"></i></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">CPU is running high</h6>
                                        <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
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
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                <span class="flex-grow-1 align-middle">Billing</span>
                                <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-help-center-landing.html">
                            <i class="ti ti-lifebuoy me-2 ti-sm"></i>
                            <span class="align-middle">Help</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-faq.html">
                            <i class="ti ti-help me-2 ti-sm"></i>
                            <span class="align-middle">FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-pricing.html">
                            <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                            <span class="align-middle">Pricing</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form id="formLogout" action="logout" method="post" enctype="multipart/form-data">
                            @csrf
                            <a class="dropdown-item" type="button" onclick="document.getElementById('formLogout').submit()">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Cari..." aria-label="Cari..." />
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
</nav>