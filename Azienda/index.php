<?php 
session_start(); 
include('header.php'); 
?>
    
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
  </head>
  <body>
    <h1 class="text-center">Benvenuto nel gestionale di dotazioni dell'Azienda</h1>
    <h6 class="text-center">Scegli cosa fare!</h6>
    <div class="container">
      <div class="pos-fixed pos-center" style="width: 400px;">
      <ul data-role="bottomsheet">
      <li><span class="icon mif-home"></span><a href="filiale.php">Filiali</a></li>
      <li><span class="icon mif-display"></span><a href="attrezzatura.php">Attrezzatura</a></li>
      <li><span class="icon mif-wrench"></span><a href="dotazione.php">Dotazioni</a></li>
      <li class="divider"></li>
      <li><span class="icon mif-switch"></span><a href="logout.php">Logout</a></li>
      </ul>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>