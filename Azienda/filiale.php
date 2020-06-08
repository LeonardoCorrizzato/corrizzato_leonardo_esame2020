<?php 
session_start(); 
include('header.php');
include("config.php");
include("azioni.php");
?>
<table class="table">
    <thead>
    <tr>
        <th>Codice Filiale</th>
        <th>Città</th>
        <th>CAP</th>
        <th>Via</th>
        <th>Civico</th>
        <th>Telefono</th>
        <th>Elimina</th>
        <th><a href="index.php">Indietro</a></th>
    </tr>
    </thead>
<?php
$query = mysqli_query($connection, "SELECT * FROM Filiale");
$quanti = mysqli_num_rows($query);	
 
if ($quanti == 0) {
        echo "Nessun record!";
    }
    else {
        for($x=0; $x<$quanti; $x++) {
            $rs = mysqli_fetch_row($query);
            $CodiceFiliale = $rs[0];
            $Città = $rs[1];
			      $CAP = $rs[2];
			      $Via = $rs[3];
            $Civico = $rs[4];
            $Telefono = $rs[5];
?>
    <tbody>
    <tr>
     <td><?php echo $CodiceFiliale;?></td>
     <td><?php echo $Città;?></td>
     <td><?php echo $CAP;?></td>
     <td><?php echo $Via;?></td>
     <td><?php echo $Civico;?></td>
     <td><?php echo $Telefono;?></td>
     <td><a href="azioni.php?elimina=<?php echo $CodiceFiliale;?>" class ="button alert rounded">Elimina</a></td>
     </tr>
     </tbody>	
<?php
         }
        
?>
</table> 
<?php
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div>
          <div>
          <br>
          <h3 class="text-center">Aggiungi una filiale</h3>
          <h6 class="text-center">Rispetta la lunghezza dei campi</h6>
          <br>
          <form method="POST" action="azioni.php">
          <input class="rounded" type="text" name="Città" placeholder="Città --> lunghezza: 2"/>
          <br>
          <input class="rounded" type="text" name="CAP" placeholder="CAP --> lunghezza: 5"/>
          <br>
          <input class="rounded" type="text" name="Via" placeholder="Via --> lunghezza: 64"/>
          <br>
          <input class="rounded" type="text" name="Civico" placeholder="Civico --> lunghezza: 5"/>
          <br>
          <input class="rounded" type="text" name="Telefono" placeholder="Telefono --> lunghezza: 10"/>
          <br>
          <button class="button success pos-bottom-center rounded" type="submit" name="aggiungi">Aggiungi</button>
          <br>
          </form>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>


