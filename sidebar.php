<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="index1.php" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="category.php" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="sub-category.php" aria-expanded="false"
                        aria-controls="sidebarLayouts">
                        <i class="ri-apps-2-line"></i> <span data-key="t-layouts">Sub Category</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="product.php" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-apps-2-line"></i> <span data-key="t-authentication">Products</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="social.php" aria-expanded="false"
                        aria-controls="sidebarPages">
                        <i class="ri-links-line"></i> <span data-key="t-pages">Social Links</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="seo.php" aria-expanded="false"
                        aria-controls="sidebarLanding">
                        <i class=" ri-bar-chart-fill"></i> <span data-key="t-landing">SEO Tools</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="slider.php" aria-expanded="false" aria-controls="sidebarUI">
                        <i class=" ri-book-open-fill"></i> <span data-key="t-base-ui">Slider</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAdvanceUI">
                        <i class="ri-pages-line"></i> <span data-key="t-advance-ui">Page Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="logo.php" class="nav-link" data-key="t-sweet-alerts">Logo</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.php" class="nav-link" data-key="t-nestable-list">Contact</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="other.php">
                        <i class=" ri-external-link-line"></i> <span data-key="t-widgets">Other</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>