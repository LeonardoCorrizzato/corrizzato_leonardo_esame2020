<?php 
$Città = "";
$CAP = "";
$Via = "";
$Civico = "";
$Telefono = "";
$Id = 0;
 
include('header.php');
include("config.php");

if(isset($_POST['aggiungi'])){
    $Città = $_POST['Città'];
    $CAP = $_POST['CAP'];
    $Via = $_POST['Via'];
    $Civico = $_POST['Civico'];
    $Telefono = $_POST['Telefono'];

    $query = "INSERT INTO Filiale (Citta, CAP, Via, Civico, Telefono) VALUES ('$Città', '$CAP', '$Via', '$Civico', '$Telefono' )";
    mysqli_query($connection, $query);
    header('location: filiale.php');
}

if(isset($_GET['elimina'])){
    $id = $_GET['elimina'];
    mysqli_query($connection, "DELETE FROM Filiale WHERE CodiceFiliale = $id");
    header('location: filiale.php');
}
?>