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

$sql = "SELECT * FROM tbl_order WHERE order_id = '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($con, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hells Print Order</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include('../boot5.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>  
    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-success text-center mt-2" role="alert">
                <h3>การสั่งซื้อเสร็จสมบูรณ์</h3>
            </div>

            <h3 class="mt-5"><b>ใบเสร็จการสั่งซื้อสินค้า</b></h3><br>
            <p>เลขที่คำสั่งซื้อ : <?=$rs['order_id'];?> </p>
            <p>ชื่อ : <?=$rs['cus_name'];?> </p>
            <p>เบอร์โทร : <?=$rs['tel'];?> </p>
            <p>ที่อยู่ : <?=$rs['address'];?> </p>

            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    </tr>
                </thead>
                <tbody>

<?php 
$sql1 = "SELECT * FROM tbl_order_detail d,tbl_product p WHERE d.p_id = p.p_id AND d.order_id = '" . $_SESSION["order_id"] . "' ";
$result1 = mysqli_query($con, $sql1);
while($row = mysqli_fetch_array($result1)) {

?>

                    <tr>
                    <th> <?=$row['p_id']?> </th>
                    <td> <?=$row['p_name']?> </td>
                    <td> <?=$row['order_price']?> </td>
                    <td> <?=$row['order_qty']?></td>
                    <td> <?=$row['Total']?></td>
                    </tr>
                </tbody>
<?php } ?>

            </table>
            <h5 align="right"> ราคารวมทั้งสิ้น : <?=number_format($total_price,2); ?> บาท </h5><br>
            <a href="index.php" class="btn btn-dark"> HOME </a>
        </div>
    </div>
</div>
<?php session_destroy(); ?>
</body>
</html>