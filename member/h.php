<?php 
session_start();
include("../condb.php");

$member_id = $_SESSION['member_id'];
$m_name = $_SESSION['m_name'];
$m_level = $_SESSION['m_level'];
$m_img = $_SESSION['m_img'];


if ($m_level != 'member'){
    header("Location: ../logout.php");
}

$sql = "SELECT * FROM tbl_member WHERE member_id = $member_id";
$result = mysqli_query($con, $sql) or die ("ERROR in query: $sql" . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);

$m_name = $row['m_name'];
$m_img = $row['m_img'];

?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hells Shop | Member</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

