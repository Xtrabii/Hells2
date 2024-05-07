<?php 
include ("../condb.php");

if (!isset($_SESSION["intLine"])) {
    $_SESSION["intLine"] = 0;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $found = false;
    foreach ($_SESSION["strProductID"] as $key => $value) {
        if ($value === $id) {
            $_SESSION["strQty"][$key]++;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $intLine = count($_SESSION["strProductID"]);
        $_SESSION["strProductID"][$intLine] = $id;
        $_SESSION["strQty"][$intLine] = 1;
    }
    header("location:cart.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hells Cart</title>
    <?php include('../boot5.php'); ?>
    <?php include('h.php'); ?>
</head>

<body>
<?php include('navbar.php'); ?>  

<div class="container">
    <form id="form1" method="POST" action="insert_cart.php">
        
        <div class="row">
            <div class="col-md-10">
            <div class="alert alert-danger text-light" style="background-color:black;" role="alert">
            <h2> Hells Cart!</h2>
            </div>

                <table class="table table-hover">

                    <tr> 
                        <th> ลำดับ </th>
                        <th> รูปสินค้า / ชื่อสินค้า </th>
                        <th> ราคา </th>
                        <th> จำนวน </th>
                        <th> ราคารวม </th>
                        <th> เพิ่ม - ลบ </th>
                        <th> ลบรายการ </th>
                    </tr>
<?php 

$Total = 0;
$sumPrice = 0;
$m = 1;
for($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if(($_SESSION["strProductID"][$i]) != "" ) {
        $sql1 = "SELECT * FROM tbl_product WHERE p_id = '" . $_SESSION["strProductID"][$i] . "' ";
        $result1 = mysqli_query($con, $sql1);
        $row_pro = mysqli_fetch_array($result1);

        $_SESSION["price"] = $row_pro['p_price'];
        $Total = $_SESSION["strQty"][$i];
        $sum = $Total * $row_pro['p_price'];
        $sumPrice =(float) $sumPrice + $sum;
        $_SESSION["sum_price"] = $sumPrice;
    
?>
                    <tr> 
                        <td> <?=$m?> </td>
                        <td> 
                            <img src='../p_img/<?=$row_pro["p_img"]?>' class="rounded-circle me-3" width="70px">
                            <?=$row_pro['p_name']; ?>  
                        </td>
                        <td> <?=$row_pro['p_price']; ?>  </td>
                        <td> <?=$_SESSION["strQty"][$i]; ?>  </td>
                        <td> <?=$sum; ?>  </td>
                        <td> 
                            <a href="order.php?id=<?=$row_pro['p_id']?>" class="link-body-emphasis"><i class="px-1 fa-solid fa-circle-plus fa-xl"></i></a>

                            <?php if($_SESSION["strQty"][$i] > 1){ ?>
                            <a href='order_del.php?id=<?=$row_pro["p_id"]?>' class='link-body-emphasis'><i class='px-2 fa-solid fa-circle-minus fa-xl'></i></a>
                            <?php } ?>
                        </td>

                        <td> <a href="cart_product_del.php?Line=<?=$i?>"><i class="fa-solid fa-trash-can fa-2xl px-4" style="color: red;"></i></a> </td>
                    </tr>
<?php
$m = $m+1;
    }
 } 
?>

<tr>
    <td class="text-center" colspan="4"> <h5><b>รวมเป็นเงิน</b></h5> </td>
    <td> <h5><?=$sumPrice; ?></h5> </td>
    <td> <h5>บาท</h5> </td>
</tr>

                </table>
                <!-- ปุ่ม -->
                  <div align="right">
                    <a href="index.php" class="btn btn-dark btn-lg"> เลือกสินค้าเพิ่ม</a>
                    <button type="submit" class="btn btn-info text-light btn-lg"> สั่งซื้อสินค้า</button>
                  </div>

            </div>
        </div>
        <br>
        <div class="col-md-10">
            <div class="alert alert-danger text-light" style="background-color:black;" role="alert">
            <h2> กรอกข้อมูลใบสั่งซื้อ</h2>
            </div>
 
  <div class="form-group">
    <div class="col-sm-6 control-label">
      ชื่อ-นามสกุล :
    </div>
    <div class="col-sm-6">
      <input type="text" name="cus_name" required class="form-control" value="<?php echo $row['m_name']; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6 control-label">
      เบอร์โทร :
    </div>
    <div class="col-sm-6">
      <input type="text" name="cus_tel" required class="form-control" value="<?php echo $row['m_tel']; ?>">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-6 control-label">
      ที่อยู่ :
    </div>
    <div class="col-sm-6">
      <textarea type="text" name="cus_add" required class="form-control" value="123"></textarea>
    </div>
  </div>
<br><br><br><br><br>
    </form>
</div>

</body>
</html>