<?php
$conn = mysqli_connect("localhost","root","","velzon") or die(mysqli_error($conn));
$cate = $_POST["cate"];
$sql = "SELECT * FROM `sub_category` WHERE main_category='$cate' ORDER BY sub_category";
$result = mysqli_query($conn, $sql);
$str = '';
while ($row = mysqli_fetch_array($result)) {
    $str .= "<option value='$row[id]'>".$row["sub_category"]."</option>";
}
echo $str;
?>