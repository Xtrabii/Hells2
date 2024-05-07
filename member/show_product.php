<?php
$q = $_GET['q'];
include("../condb.php");
$sql = "SELECT * FROM tbl_product as p
INNER JOIN tbl_type  as t ON p.type_id=t.type_id
ORDER BY p.p_id DESC";  //เรียกข้อมูลมาแสดงทั้งหมด
$result = mysqli_query($con, $sql);
while($row_prd = mysqli_fetch_array($result)){
?>

<div class="col-sm-3" align="center">
    <div class="card mb-4 me-4" style="width: 19rem;">
        <br>
        <img class="card-img-top">
        <a href=""> <?php echo"<img src='../p_img/".$row_prd['p_img']."'width='300' height='300'>";?></a>
        <div class="card-body ">
            <a href="prd.php?id=<?php echo $row_prd[0]; ?>" class="link-body-emphasis"><b> <?php echo $row_prd["p_name"];?></b> </a>
            <br><br>

            ราคา <font color="red"> <?php echo $row_prd["p_price"];?></font> บาท
            <br>
            
            เหลือ<b> <?php echo $row_prd["p_qty"];?> </b> <?php echo $row_prd["p_unit"];?> 
            <br><br>
            <button type="button" class="btn btn-dark"><a href="prd.php?id=<?php echo $row_prd[0]; ?>" class="link-body-emphasis text-light"> รายละเอียด </a></button>
            <a href="order.php?id=<?=$row_prd['p_id']?>" class="btn btn-info link-body-emphasis text-light"> add cart </a>
        </div>
    </div>
</div>
<?php } ?>