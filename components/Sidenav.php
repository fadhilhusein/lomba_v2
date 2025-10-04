<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu scrollable">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Core</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link <?php echo $lastURL === "dashboard.php" ? "nav-active" : ""; ?>" href="dashboard.php">
                    <div class="nav-link-icon"><i class="ph ph-gauge" style="font-size: 18px;"></i></div>
                    Dashboards
                </a>
                <a class="nav-link <?php echo $lastURL === "kategori.php" ? "nav-active" : ""; ?>" href="kategori.php">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Kategori
                </a>
                <a class="nav-link <?php echo $lastURL === "create.php" ? "nav-active" : ""; ?>" href="create.php">
                    <div class="nav-link-icon"><i data-feather="plus-circle"></i></div>
                    Tambah Job
                </a>

                <!-- Sidenav Heading (Custom)-->
                <div class="sidenav-menu-heading">Custom</div>
                <!-- Sidenav Accordion (Pages)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Pages
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                        <!-- Nested Sidenav Accordion (Pages -> Error)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            Error
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError"
                            data-bs-parent="#accordionSidenavPagesMenu">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="">Test</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="pricing.html">Pricing</a>
                    </nav>
                </div>
                <!-- Sidenav Heading (Addons)-->
                <div class="sidenav-menu-heading">Plugins</div>
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Charts
                </a>
                <!-- Sidenav Link (Tables)-->
                <a class="nav-link" href="tables.html">
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Tables
                </a>

                <!-- <div class="cards mt-4 p-3 d-flex">
                    <div class="cards__promotion w-100 p-3 rounded-3">
                        <span class="cards__title text-white fw-bold">Premium Membership</span>
                        <p class="cards__description text-white mt-1">Langganan membership untuk mendapatkan keuntungannya!</p>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="">
            <div class="cards p-3 d-flex">
                <div class="cards__promotion w-100 p-3 rounded-3">
                    <span class="cards__title text-white fw-bold d-flex align-items-end lh-1 gap-1"><i class="ph-fill ph-sparkle"></i> Premium Membership</span>
                    <p class="cards__description text-white mt-1">Langganan membership untuk mendapatkan keuntungannya!</p>
                </div>
            </div>
        </div>
    </nav>
</div>