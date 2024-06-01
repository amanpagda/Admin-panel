<?php
include ("db.php");

// ADMIN QUERYS START
// admin insert start
if (isset($_POST["admin_submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "INSERT INTO `admin`(`name`, `email`, `password`, `role`, `date`) VALUES ('$name','$email','$password','$role', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Insert Successful');
        window.location.href = 'index1.php';
        </script>";
    } else {
        echo "<script>
        alert('Insert Error');
        window.location.href = 'index1.php';
        </script>";
    }

}
// admin insert end

// admin update start

if (isset($_POST["admin_update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`role`='$role',`date`=current_timestamp() WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Upadte Successful');
        window.location.href = 'index1.php';
        </script>";
    } else {
        echo "<script>
        alert('Upadte Error');
        window.location.href = 'index1.php';
        </script>";
    }
}
// admin update end

// admin delete start

if (isset($_POST["admin_delete"])) {
    $id = $_POST['del_id'];

    $sql = "DELETE FROM `admin` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Delete Successful');
        window.location.href = 'index1.php';
        </script>";
    } else {
        echo "<script>
        alert('Delete Error');
        window.location.href = 'index1.php';
        </script>";
    }
}
// admin delete end
// ADMIN QUERYS END


// CATEGORY QUERYS START
// category insert start
$targetdir = "image/cat-image/";
$watermark_path = "watermark.png";
$statusMsg = "";

if (isset($_POST["category_submit"])) {
    $category = $_POST["category"];
    $sub_category = $_POST["sub_category"];
    $desc = $_POST["description"];

    $random = rand(1, 99999);
    $image = $random . '-' . $_FILES["image"]["name"];

    $sql = "INSERT INTO `category`(`category`, `sub_category`, `image`, `description`, `date`) VALUES ('$category','$sub_category','$image','$desc',current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if (!empty($_FILES["image"]["name"])) {
        $image_name = basename($image);
        $file_name = $image_name;
        $targetFilePath = $targetdir . $file_name;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $newFolder = "image/cat-image-watermark/";
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
                    header('location: category.php');
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
// category insert end


// category update start

if (isset($_POST["category_update"])) {
    $id = $_POST["id"];
    $category = $_POST["category"];
    $sub_category = $_POST["sub_category"];
    $desc = $_POST["description"];

    $image = $_FILES["image"]["name"];
    $old_image = $_POST["old_image"];

    if ($image !== '') {
        $update_file = $image;
        unlink("image/cat-image/" . $old_image);
        unlink("image/cat-image-watermark/" . $old_image);
        if (file_exists("image/cat-image/" . $image)) {

            echo "<script>
                alert('Image already Exists');
                window.location.href = 'category.php';
                </script>";

        }
    } else {
        $update_file = $old_image;
    }
    $sql = "UPDATE `category` SET `category`='$category',`sub_category`='$sub_category',`image`='$update_file',`description`='$desc',`date`= current_timestamp() WHERE id='$id'";


    $result = mysqli_query($conn, $sql);

    if (!empty($_FILES["image"]["name"])) {
        $image_name = basename($image);
        $file_name = $image_name;
        $targetFilePath = $targetdir . $file_name;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $newFolder = "image/cat-image-watermark/";
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
                        window.location.href = 'category.php';
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
// category update end

// category Detele Start
if (isset($_POST["category_delete"])) 
{
    $id = $_POST['del_id'];
    $image = $_POST['del_image'];

    $sql = "DELETE FROM `category` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        unlink("image/cat-image/" . $image);
        unlink("image/cat-image-watermark/" . $image);
        echo "<script>
        alert('Delete Successful');
        window.location.href = 'category.php';
        </script>";
    }else{
        echo "<script>
        alert('Delete Error');
        window.location.href = 'category.php';
        </script>";
    }
}
// category Detele end
// CATEGORY QUERYS END
?>