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







?>