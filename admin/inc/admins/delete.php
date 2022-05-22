<?php
$con = mysqli_connect("localhost", "root", "", "mega");
$select = mysqli_query($con, "SELECT * FROM admin");
if (!$con) {
    echo mysqli_connect_error();
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = "DELETE FROM `admin` WHERE `admin`.`id`=" . $user['id'] . "LIMIT 1";
if (mysqli_query($con, $query)) {
    echo"Delete done";
} else {
    echo mysqli_error($con);
}
mysqli_close($con);
