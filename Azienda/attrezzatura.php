<?php session_start(); 
include('header.php');
include("config.php");
include("azioni2.php");

?>
<table class="table">
    <thead>
    <tr>
        <th>Codice Attrezzatura</th>
        <th>Nome Attrezzatura</th>
        <th>Descrizione</th>
        <th>Anno Produzione</th>
        <th>Elimina</th>
        <th><a href="index.php">Indietro</a></th>
    </tr>
    </thead>
<?php
$query = mysqli_query($connection, "SELECT * FROM Attrezzatura");
$quanti = mysqli_num_rows($query);	
 
if ($quanti == 0) {
        echo "Nessun record!";
    }
    else {
        for($x=0; $x<$quanti; $x++) {
            $rs = mysqli_fetch_row($query);
            $CodiceAttrezzatura = $rs[0];
            $NomeAttrezzatura = $rs[1];
            $Descrizione = $rs[2];
            $AnnoProduzione = $rs[3];
?>
    <tbody>
    <tr>
     <td><?php echo $CodiceAttrezzatura;?></td>
     <td><?php echo $NomeAttrezzatura;?></td>
     <td><?php echo $Descrizione;?></td>
     <td><?php echo $AnnoProduzione;?></td>
     <td><a href="azioni2.php?elimina=<?php echo $CodiceAttrezzatura;?>" class ="button alert rounded">Elimina</a></td>
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
          <h3 class="text-center">Aggiungi dell'Attrezzatura</h3>
          <h6 class="text-center">Rispetta la lunghezza dei campi</h6>
          <br>
          <form method="POST" action="azioni2.php">
          <input class="rounded" type="text" name="NomeAttrezzatura" placeholder="Nome Attrezzatura --> lunghezza: 64"/>
          <br>
          <input class="rounded" type="text" name="Descrizione" placeholder="Descrizione --> lunghezza: 256"/>
          <br>
          <input class="rounded" type="text" name="AnnoProduzione" placeholder="Anno Produzione --> lunghezza: 4"/>
          <br>
          <button class="button success pos-bottom-center rounded" type="submit" name="aggiungi">Aggiungi</button>
          <br>
          </form>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>