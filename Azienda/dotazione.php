<?php 
session_start(); 
include('header.php');
include("config.php");
?>
<table class="table">
    <thead>
    <tr>
        <th>Codice Filiale</th>
        <th>Città Filiale</th>
        <th>Nome Attrezzatura</th>
        <th>Descrizione</th>
        <th>Anno Produzione</th>
        <th>Quantità</th>
        <th><a href="index.php">Indietro</a></th>
    </tr>
    </thead>
<?php
$query = mysqli_query($connection, "SELECT F.CodiceFiliale, F.Citta, A.NomeAttrezzatura, A.Descrizione, A.AnnoProduzione, D.Quantita FROM Dotazione AS D LEFT JOIN Filiale AS F ON D.CodiceFiliale = F.CodiceFiliale LEFT JOIN Attrezzatura AS A ON D.CodiceAttrezzatura = A.CodiceAttrezzatura ");
$quanti = mysqli_num_rows($query);	
 
if ($quanti == 0) {
        echo "Nessun record!";
    }
    else {
        for($x=0; $x<$quanti; $x++) {
            $rs = mysqli_fetch_row($query);
            $CodiceFiliale = $rs[0];
            $Città = $rs[1];
            $NomeAttrezzatura = $rs[2];
            $Descrizione = $rs[3];
            $AnnoProduzione = $rs[4];
            $Quantità = $rs[5];
?>
    <tbody>
    <tr>
     <td><?php echo $CodiceFiliale;?></td>
     <td><?php echo $Città; ?></td>
     <td><?php echo $NomeAttrezzatura; ?></td>
     <td><?php echo $Descrizione; ?></td>
     <td><?php echo $AnnoProduzione; ?></td>
     <td><?php echo $Quantità;?></td>
     </tr>
     </tbody>	
<?php
         }
        
?>
</table> 
<?php
    }
?>
