<?php
include ("db.php");
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
                                    <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM `sub_category` WHERE id='$id'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <form action="sub-category.php" method="POST" enctype="multipart/form-data"
                                            class="row g-3">
                                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                            <div class="col-md-12">
                                                <label for="fullnameInput" class="form-label">Category</label>
                                                <select class="col-md-6 form-select mb-3" value="<?php echo $row["main_category"];?>" name="main_category" required>
                                                    <option disabled>Open this select menu</option>
                                                    <?php
                                                    $category = $row["main_category"];
                                                    $sql_a = "SELECT * FROM `category` WHERE sub_category = 'Yes'";
                                                    $result_cat = mysqli_query($conn, $sql_a);
                                                    while ($ab = mysqli_fetch_assoc($result_cat)) {
                                                        ?>
                                                        <option value="<?php echo $ab["id"]; ?>" <?php if ($category == $ab["cat_category"]) {
                                                               echo "selected";
                                                           } ?>>
                                                            <?php echo $ab["cat_category"]; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fullnameInput" class="form-label">Sub Category Name</label>
                                                <input type="text" class="form-control" id="fullnameInput" required
                                                    name="sub_category" value="<?php echo $row["sub_category"]; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formFile" class="form-label">Sub Category Image</label>
                                                <input class="form-control" type="file" id="formFile" name="image"
                                                    accept="png, jpeg, jpg, webp">
                                                <input class="form-control" type="hidden" id="formFile" name="old_image"
                                                    accept="png, jpeg, jpg, webp" value="<?php echo $row["image"]; ?>">
                                                <img src="<?php echo "image/sub-category/".$row["image"]; ?>" width="200px" alt="">
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="inputPassword4" class="form-label">Description</label>
                                                <textarea class="form-control" id="meassageInput" rows="3"
                                                    name="description" placeholder="Enter your message"
                                                    required><?php echo $row["description"]; ?></textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-end">
                                                    <button type="submit" name="update-sub-category" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
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

            <!-- App js -->
            <script src="assets/js/app.js"></script>
</body>

</html>


<?php 

//sub category update start
$targetdir = "image/sub-category/";
$watermark_path = "watermark.png";
$statusMsg = "";
if (isset($_POST["update-sub-category"])) {
    $id = $_POST["id"];
    $main_category = $_POST["main_category"];
    $sub_category = $_POST["sub_category"];
    $description = $_POST["description"];

    $image = $_FILES["image"]["name"];
    $old_image = $_POST["old_image"];

    if ($image !== '') {
        $update_file = $image;
        unlink("image/sub-category/" . $old_image);
        unlink("image/sub-cat-watermark/" . $old_image);
        if (file_exists("image/sub-category/" . $image)) {

            echo "<script>
                alert('Image already Exists');
                window.location.href = 'sub-category.php';
                </script>";

        }
    } else {
        $update_file = $old_image;
    }
    $sql = "UPDATE `sub_category` SET `main_category`='$main_category',`sub_category`='$sub_category',`image`='$update_file',`description`='$description',`date`= current_timestamp() WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);

    if (!empty($_FILES["image"]["name"])) {
        $image_name = basename($image);
        $file_name = $image_name;
        $targetFilePath = $targetdir . $file_name;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $newFolder = "image/sub-cat-watermark/";
        $newtargetFilePath = $newFolder . $file_name;

        $allow_type = array('jpg', 'png', 'jpeg', 'webp');

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
                    case 'webp':
                        $im = imagecreatefromwebp($newtargetFilePath);
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
                    echo "<script>
                        alert('Update Successful');
                        window.location.href = 'sub-category.php';
                        </script>";
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
//sub category update end

?>