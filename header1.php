<header class="header">

   <div class="flex">

      <a href="#" class="logo">Beauty Products</a>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

<a href="products.php" class="cart"><i class="fa-solid fa-eye"></i><b> View </b>  </a>


      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>