<?php
include ("db.php");
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

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
                                        <form action="product.php" method="POST" enctype="multipart/form-data"
                                            class="row g-3">
                                            <input type="hidden" name="id">
                                            <div class="col-md-12">
                                                <label for="fullnameInput" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" required name="product_name"
                                                    placeholder="Enter Category Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fullnameInput" class="form-label">Category</label>
                                                <select class="col-md-6 form-select mb-3" id="category"
                                                    aria-label=".form-select-lg example" name="pro_category" required>
                                                    <option selected disabled>Open this select menu</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `category` WHERE sub_category = 'Yes'";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>">
                                                            <?php echo $row["cat_category"] ?>
                                                        </option>
                                                        <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fullnameInput" class="form-label">Sub Category</label>
                                                <select class="col-md-6 form-select mb-3"
                                                    aria-label=".form-select-lg example" name="sub_category"
                                                    id="sub_category" required>
                                                    <option selected disabled>Open this select menu</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="formFile" class="form-label">Product Image</label>
                                                <input class="form-control" type="file" id="formFile" name="image"
                                                    accept="png, jpeg, jpg, webp" required>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="inputPassword4" class="form-label">Product
                                                    Description</label>
                                                <textarea class="form-control" id="meassageInput" rows="3"
                                                    name="description" placeholder="Enter your message"
                                                    required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-end">
                                                    <button type="submit" name="product_submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>


                                        <?php
                                        $targetdir = "image/product/";
                                        $watermark_path = "watermark.png";
                                        $statusMsg = "";

                                        // insert start
                                        
                                        if (isset($_POST["product_submit"])) {
                                            $product_name = $_POST["product_name"];
                                            $pro_category = $_POST["pro_category"];
                                            $sub_category = $_POST["sub_category"];
                                            $description = $_POST["description"];

                                            $random = rand(1, 99999);
                                            $image = $random . '-' . $_FILES["image"]["name"];

                                            $sql = "INSERT INTO `product`(`product_name`, `pro_category`, `sub_category`, `image`, `description`, `date`) VALUES ('$product_name','$pro_category','$sub_category','$image','$description',current_timestamp())";
                                            $result = mysqli_query($conn, $sql);

                                            if (!empty($_FILES["image"]["name"])) {
                                                $image_name = basename($image);
                                                $file_name = $image_name;
                                                $targetFilePath = $targetdir . $file_name;
                                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                                $newFolder = "image/product-watermark/";
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
                                                            alert('Insert Successfully');
                                                            window.location.href = 'product.php';
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


                                        // product Detele Start
                                        
                                        if (isset($_POST["product_delete"])) {
                                            $id = $_POST['del_id'];
                                            $image = $_POST['del_image'];

                                            $sql = "DELETE FROM `product` WHERE id='$id'";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                unlink("image/product/" . $image);
                                                unlink("image/product-watermark/" . $image);
                                                echo "<script>
                                                alert('Delete Successful');
                                                window.location.href = 'product.php';
                                                </script>";
                                            } else {
                                                echo "<script>
                                                alert('Delete Error');
                                                window.location.href = 'product.php';
                                                </script>";
                                            }
                                        }
                                        // product Detele end
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Products Details</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <!-- Tables Without Borders -->
                                                <table class="table table-borderless table-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">Sub Category</th>
                                                            <th scope="col">Product Image</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $conn = mysqli_connect("localhost", "root", "", "velzon");
                                                        $sql = "SELECT * FROM `product`";
                                                        $result = mysqli_query($conn, $sql);
                                                        $i = 0;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $i += 1;
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i; ?></th>
                                                                <td><span class="badge bg-success-subtle text-success">
                                                                        <?php echo $row["product_name"]; ?>
                                                                    </span>
                                                                </td>
                                                                <?php
                                                                $conn = mysqli_connect("localhost", "root", "", "velzon");
                                                                $category = $row["pro_category"];
                                                                $sub_sql = "SELECT * FROM `category` WHERE id='$category'";
                                                                $result_sub = mysqli_query($conn, $sub_sql);
                                                                while ($row_sub = mysqli_fetch_assoc($result_sub)) {
                                                                    ?>
                                                                    <td><?php echo $row_sub["cat_category"]; ?></td>
                                                                    <?php
                                                                }
                                                                ?>


                                                                <?php
                                                                $conn = mysqli_connect("localhost", "root", "", "velzon");
                                                                $ps_id = $row["sub_category"];
                                                                $sub_sql = "SELECT * FROM `sub_category` WHERE id='$ps_id'";
                                                                $result_sub = mysqli_query($conn, $sub_sql);
                                                                while ($row_sub = mysqli_fetch_assoc($result_sub)) {
                                                                    ?>
                                                                    <td><?php echo $row_sub["sub_category"]; ?></td>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <td><img src="<?php echo "image/product/" . $row["image"] ?>"
                                                                        width="150px" alt=""></td>
                                                                <td><?php echo $row["description"] ?></td>
                                                                <td>
                                                                    <div class="hstack gap-3 fs-15">
                                                                        <a href="<?php echo "edit_product.php?id=$row[id]"?>" class="link-primary">
                                                                            <i class="ri-settings-4-line"></i>
                                                                        </a>
                                                                        <form action="product.php" method="POST">
                                                                            <input type="hidden" name="del_id" value="<?php echo $row["id"]; ?>">
                                                                            <input type="hidden" name="del_image" value="<?php echo $row["image"]; ?>">
                                                                            <button type="submit" name="product_delete"
                                                                                class="btn btn-danger"><i
                                                                                    class="fa-solid fa-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#category').change(function () {
                        var category = $(this).val();
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: { cate: category },
                            success: function (data) {
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