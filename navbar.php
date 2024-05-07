<?php require_once('condb.php');
error_reporting(0);
$query_typeprd = "SELECT * FROM tbl_type ORDER BY type_id ASC";
$typeprd =mysqli_query($con, $query_typeprd) or die ("Error in query: $query_typeprd " . mysqli_error($con));
// echo($query_typeprd);
// exit();
$row_typeprd = mysqli_fetch_assoc($typeprd);
$totalRows_typeprd = mysqli_num_rows($typeprd);
?>

<!--Navbar-->
<nav class="sticky-top bg-body-tertiary p-3 mb-3 border-bottom infobg">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <img class="d-inline-block align-text-top me-3 rounded-circle" src="images/Hell logo.png" width="40" height="40">
      </a>
      
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 nav-underline">
        <li><a href="index.php" class="nav-link px-2 link-body-emphasis active"><i class="fa-solid fa-house"></i> Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-2 link-body-emphasis" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-bag-shopping"></i> ประเภทสินค้า
          </a>
          <ul class="dropdown-menu">
            <?php do { ?>
            <a href="index.php?act=showbytype&type_id=<?php echo $row_typeprd['type_id'];?>" class="dropdown-item"> <?php echo $row_typeprd['type_name']; ?></a>
            <?php } while ($row_typeprd = mysqli_fetch_assoc($typeprd)); ?>
          </ul>
        </li>
      </ul>
      

      <ul class="nav col-12 col-lg-auto me-3 mb-2 mb-md-0 ms-lg-auto">
        <li><a href="index.php?act=add" class="nav-link px-2 link-body-emphasis active"><i class="fa-solid fa-user-plus"></i> Sign up</a></li>
        <?php
            if ($member_id!='') {
            
            } else {
            ?>
        <li><a href="form_login.php" class="nav-link px-2 link-body-emphasis active"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
        <?php } ?>
      </ul>

      <form class="col-6 col-lg-auto mb-0 mb-lg-0 me-3 me-lg-3" role="search" action="index.php" method="GET">
        <input id="search_item" type="search" class="form-control" placeholder="Search..." aria-label="Search" name="q">
      </form>

      <div class="dropdown text-end">
        <a href="#" class="col-2 d-block link-body-emphasis text-decoration-none" aria-expanded="false">
          <img src="images/Hell logo.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
      </div>
    </div>
  </div>
</nav>