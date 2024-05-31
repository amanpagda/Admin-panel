<?php 
include("db.php");

?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Company Name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php
        include "header.php";
        ?>

        <!-- ========== App Menu ========== -->
        <?php
        include "sidebar.php";
        ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Dashboard</h4>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class=" d-flex justify-content-center text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            Admins</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-center mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                                class="counter-value" data-target="3">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="d-flex justify-content-center text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            Categories</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-center mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                                class="counter-value" data-target="10">0</span></h4>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="d-flex justify-content-center text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            Total Products</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-center mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                                class="counter-value" data-target="500">0</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div> <!-- end row-->

                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Add Admin</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="javascript:void(0);">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your name" id="name" name="name">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control"
                                                            placeholder="example@gamil.com" id="email" name="email">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Password" id="password" name="password">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-sm-6">
                                                    <label class="visually" for="role">Role</label>
                                                    <select class="form-select" data-choices data-choices-sorting="true"
                                                        id="role" name="role">
                                                        <option selected disabled>Select your Role</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="super-admin">Super Admin</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-primary">Reset</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Admin Details</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <!-- Tables Border Colors -->
                                                <table class="table table-bordered border-secondary table-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Assignee</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Implement new UX</td>
                                                            <td><span
                                                                    class="badge bg-primary-subtle text-primary">Backlog</span>
                                                            </td>
                                                            <td>Lanora Sandoval</td>
                                                            <td>$4,521</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Design syntax</td>
                                                            <td><span
                                                                    class="badge bg-secondary-subtle text-secondary">In
                                                                    Progress</span></td>
                                                            <td>Calvin Garrett</td>
                                                            <td>$7,546</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Configurable resources</td>
                                                            <td><span
                                                                    class="badge bg-success-subtle text-success">Done</span>
                                                            </td>
                                                            <td>Florence Guzman</td>
                                                            <td>$1,350</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">4</th>
                                                            <td>Implement extensions</td>
                                                            <td><span
                                                                    class="badge bg-secondary-subtle text-secondary">In
                                                                    Progress</span></td>
                                                            <td>Maritza Blanda</td>
                                                            <td>$4,521</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end col -->
                                </div>






                            </div>
                        </div>
                        <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                    <?php
                    include "footer.php";
                    ?>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->



            <!--start back-to-top-->
            <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>
            <!--end back-to-top-->

            <!--preloader-->
            <div id="preloader">
                <div id="status">
                    <div class="spinner-border text-primary avatar-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>

            <!-- JAVASCRIPT -->
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/node-waves/waves.min.js"></script>
            <script src="assets/libs/feather-icons/feather.min.js"></script>
            <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
            <script src="assets/js/plugins.js"></script>

            <!-- apexcharts -->
            <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

            <!-- Vector map-->
            <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
            <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

            <!--Swiper slider js-->
            <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

            <!-- Dashboard init -->
            <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

            <!-- App js -->
            <script src="assets/js/app.js"></script>
</body>

</html>