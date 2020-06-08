<?php 
$NomeAttrezzatura = "";
$Descrizione = "";
$AnnoProduzione = "";
$Id = 0;
 
include('header.php');
include("config.php");

if(isset($_POST['aggiungi'])){
    $NomeAttrezzatura = $_POST['NomeAttrezzatura'];
    $Descrizione = $_POST['Descrizione'];
    $AnnoProduzione = $_POST['AnnoProduzione'];

    $query = "INSERT INTO Attrezzatura (NomeAttrezzatura, Descrizione, AnnoProduzione) VALUES ('$NomeAttrezzatura', '$Descrizione', '$AnnoProduzione')";
    mysqli_query($connection, $query);
    header('location: attrezzatura.php');
}
if(isset($_GET['elimina'])){
    $id = $_GET['elimina'];
    mysqli_query($connection, "DELETE FROM Attrezzatura WHERE CodiceAttrezzatura = $id");
    header('location: attrezzatura.php');
}
?>