<?php
include("db.php");
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Products</title>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Add Products</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $id = $_GET["id"];
                                        $sql_pro = "SELECT * FROM `product` WHERE id='$id'";
                                        $result_pro = mysqli_query($conn, $sql_pro);
                                        while ($a = mysqli_fetch_assoc($result_pro)) {
                                        ?>
                                            <form action="product.php" method="POST" enctype="multipart/form-data" class="row g-3">
                                                <input type="hidden" name="id" value="<?php echo $a["id"]; ?>">
                                                <div class="col-md-12">
                                                    <label for="fullnameInput" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" required name="product_name" value="<?php echo $a["product_name"]; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="fullnameInput" class="form-label">Category</label>
                                                    <select class="col-md-6 form-select mb-3" id="category" aria-label=".form-select-lg example" name="pro_category" required>
                                                        <option disabled>Open this select menu</option>
                                                        <?php
                                                        $cate = $a["pro_category"];
                                                        $sql = "SELECT * FROM `category` WHERE sub_category = 'Yes'";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                            <option value="<?php echo $row["id"] ?>" <?php if ($cate == $row["id"]) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                                <?php echo $row["cat_category"] ?>
                                                            </option>
                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="fullnameInput" class="form-label">Sub Category</label>
                                                    <select class="col-md-6 form-select mb-3" aria-label=".form-select-lg example" name="sub_category" id="sub_category" required>
                                                        <option disabled>Open this select menu</option>
                                                        <?php
                                                        $cate_sub = $a["sub_category"];
                                                        $sql_sub = "SELECT * FROM `sub_category` WHERE id = '$cate_sub'";
                                                        $result_sub = mysqli_query($conn, $sql_sub);
                                                        while ($row1 = mysqli_fetch_array($result_sub)) {
                                                        ?>
                                                            <option value="<?php echo $row1["id"] ?>" <?php if ($cate_sub == $row1["id"]) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                                <?php echo $row1["sub_category"] ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="formFile" class="form-label">Product Image</label>
                                                    <input class="form-control mb-3" type="file" id="formFile" name="image" accept="png, jpeg, jpg, webp">
                                                    <input class="form-control" type="hidden" id="formFile" name="old_image" accept="png, jpeg, jpg, webp" value="<?php echo $a["image"]; ?>">
                                                    <img src="<?php echo "image/product/" . $a["image"]; ?>" width="150px">
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="inputPassword4" class="form-label">Product Description</label>
                                                    <textarea class="form-control" id="meassageInput" rows="3" name="description" required><?php echo $a["description"]; ?></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-end">
                                                        <button type="submit" name="pro_update" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        // category update start

                                        $targetdir = "image/product/";
                                        $watermark_path = "watermark.png";
                                        $statusMsg = "";
                                        if (isset($_POST["pro_update"])) {
                                            $id = $_POST["id"];
                                            $name = $_POST["product_name"];
                                            $category = $_POST["pro_category"];
                                            $pro_sub_cate = $_POST["sub_category"];
                                            $desc = $_POST["description"];

                                            $image = $_FILES["image"]["name"];
                                            $old_image = $_POST["old_image"];

                                            if ($image !== '') {
                                                $update_file = $image;
                                                unlink("image/product/" . $old_image);
                                                unlink("image/product-watermark/" . $old_image);
                                                if (file_exists("image/product/" . $image)) {

                                                    header("location: product.php?already_exists_file");
                                                }
                                            } else {
                                                $update_file = $old_image;
                                            }

                                            $sql_i = "UPDATE `product` SET `product_name`='$name',`pro_category`='$category',`sub_category`='$pro_sub_cate',`image`='$update_file',`description`='$desc',`date`=current_timestamp() WHERE `id`='$id'";
                                            $result_i = mysqli_query($conn, $sql_i);

                                            if ($result_i) {
                                                echo "<script>alert('Done');</script>";
                                            }

                                            if (!empty($_FILES["image"]["name"])) {
                                                $image_name = basename($image);
                                                $file_name = $image_name;
                                                $targetFilePath = $targetdir . $file_name;
                                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                                $newFolder = "image/product-watermark/";
                                                $newtargetFilePath = $newFolder . $file_name;

                                                $allow_type = array('jpg', 'png', 'jpeg');

                                                if (in_array($fileType, $allow_type)) {

                                                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $newtargetFilePath)) {
                                                        $watermark_img = imagecreatefrompng($watermark_path);
                                                        switch ($fileType) {
                                                            case 'jpg':
                                                                $im = imagecreatefromjpeg($newtargetFilePath);
                                                                break;
                                                            case 'jpeg':
                                                                $im = imagecreatefromjpeg($newtargetFilePath);
                                                                break;
                                                            case 'png':
                                                                $im = imagecreatefrompng($newtargetFilePath);
                                                                break;
                                                            default:
                                                                $im = imagecreatefromjpeg($newtargetFilePath);
                                                        }

                                                        $main_width = imagesx($im);
                                                        $main_height = imagesy($im);
                                                        $watermark_width = imagesx($watermark_img);
                                                        $watermark_height = imagesy($watermark_img);

                                                        $x = ($main_width - $watermark_width) / 2;
                                                        $y = ($main_height - $watermark_height) / 2;

                                                        imagecopy($im, $watermark_img, $x, $y, 0, 0, $watermark_width, $watermark_height);


                                                        imagepng($im, $targetFilePath);
                                                        imagedestroy($im);

                                                        if (file_exists($targetFilePath)) {
                                                            header('location: product.php');
                                                        } else {
                                                            $statusMsg = '<p style="color:#EA4335;">Errom watermark</p>';
                                                        }
                                                    } else {
                                                        $statusMsg = '<p style="color:#EA4335;">Errom upload your watermark</p>';
                                                    }
                                                } else {
                                                    $statusMsg = '<p style="color:#EA4335;">Sorry only jpg, png, & jpeg file uploaded</p>';
                                                }
                                            } else {
                                                $statusMsg = '<p style="color:#EA4335;">Please select a file to upload</p>';
                                            }
                                        }
                                        // product update end
                                        // category update end

                                        ?>
                                    </div>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#category').change(function() {
                        var category = $(this).val();
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: {
                                cate: category
                            },
                            success: function(data) {
                                $('#sub_category').html(data);
                            }
                        })
                    })
                })
            </script>

            <!-- App js -->
            <script src="assets/js/app.js"></script>
</body>

</html>