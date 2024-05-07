<?php
session_start();
include("../condb.php");

$cusName = $_POST['cus_name'];
$cusTel= $_POST['cus_tel'];
$cusAddress = $_POST['cus_add'];

if (isset($_SESSION["intLine"])) {
    $sql = "INSERT INTO tbl_order(cus_name, address, tel, total_price) value('$cusName', '$cusAddress', '$cusTel', '" . $_SESSION["sum_price"] . "')";
    mysqli_query($con,$sql);

    $orderID = mysqli_insert_id($con);
    $_SESSION["order_id"] = $orderID;

    // ตรวจสอบก่อนว่า $_SESSION["strProductID"] มีค่าหรือไม่ก่อนที่จะเข้าถึง
    if(isset($_SESSION["strProductID"]) && is_array($_SESSION["strProductID"]) && count($_SESSION["strProductID"]) > 0) {
        for($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
            if(isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "" ) {
                // ดึงข้อมูลสินค้า
                $sql1 = "SELECT * FROM tbl_product WHERE p_id = '" . $_SESSION["strProductID"][$i] . "' ";
                $result1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($result1);
                $price = $row1['p_price'];
                $total = $_SESSION["strQty"][$i] * $price ;

                $sql2 = "INSERT INTO tbl_order_detail(order_id, p_id, order_price, order_qty, Total) value('$orderID', '" . $_SESSION["strProductID"][$i] . "', '$price', '" . $_SESSION["strQty"][$i] . "', '$total')";

                if(mysqli_query($con, $sql2)){
                    // ลดจำนวนสินค้าลง
                    $sql3 = "UPDATE tbl_product SET p_qty = p_qty - '" . $_SESSION["strQty"][$i] . "' WHERE p_id = '" . $_SESSION["strProductID"][$i] . "' ";
                    mysqli_query($con, $sql3);
                    echo "<script> alert('บันทึกเรียบร้อย') </script>";
                    echo "<script type='text/javascript'>";
                    echo "window.location = 'print_order.php'; ";
                    echo "</script>";
                }
            }
        }
    }
    mysqli_close($con);

} else {
    echo "Session intLine not set!";
}
?>
