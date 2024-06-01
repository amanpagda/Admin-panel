<?php
include ("db.php");
include ("data.php");
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard</title>
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
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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

                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Add Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="category.php" method="POST" enctype="multipart/form-data"
                                            class="row g-3">
                                            <div class="col-md-12">
                                                <label for="fullnameInput" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="fullnameInput" required
                                                    name="category" placeholder="Enter Category Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fullnameInput" class="form-label">Sub Category</label>
                                                <select class="col-md-6 form-select mb-3"
                                                    aria-label=".form-select-lg example" name="sub_category" required>
                                                    <option selected disabled>Open this select menu</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formFile" class="form-label">Category Image</label>
                                                <input class="form-control" type="file" id="formFile" name="image"
                                                    accept="png, jpeg, jpg, webp" required>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="inputPassword4" class="form-label">Description</label>
                                                <textarea class="form-control" id="meassageInput" rows="3"
                                                    name="description" placeholder="Enter your message"
                                                    required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-end">
                                                    <button type="submit" name="category_submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
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
                                                <!-- Tables Without Borders -->
                                                <table class="table table-borderless table-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Category Name</th>
                                                            <th scope="col">Sub Category</th>
                                                            <th scope="col">Category Image</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `category`";
                                                        $result = mysqli_query($conn, $sql);
                                                        $i = 0;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $i += 1;
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i; ?></th>
                                                                <td>
                                                                    <span class="badge bg-success-subtle text-success">
                                                                        <?php echo $row["category"]; ?>
                                                                    </span>
                                                                </td>
                                                                <td><?php echo $row["sub_category"]; ?></td>
                                                                <td><img src="<?php echo "image/cat-image/" . $row["image"]; ?>"
                                                                        width="150px" alt=""></td>
                                                                <td><?php echo $row["description"]; ?></td>
                                                                <td>
                                                                    <div class="hstack gap-3 fs-15">
                                                                        <a href="<?php echo "cat-update.php?id=$row[id]" ?>"
                                                                            class="link-primary">
                                                                            <i class="ri-settings-4-line"></i>
                                                                        </a>
                                                                        <form action="category.php" method="POST">
                                                                            <input type="hidden" name="del_id" value="<?php echo $row["id"]; ?>">
                                                                            <input type="hidden" name="del_image" value="<?php echo $row["image"]; ?>">
                                                                            <button type="submit" name="category_delete"
                                                                                class="btn btn-danger"><i
                                                                                    class="fa-solid fa-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }

                                                        ?>
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