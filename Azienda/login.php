<?php
    include("header.php");
    include("config.php");
    session_start();

    $errors='';
    $success='';
    if(isset($_POST['loginBtn'])){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        if(empty($email) or empty($password)){
            $errors .= 'Non lasciare campi vuoti!';
        }else{
            $select = mysqli_query($connection, "SELECT * FROM Utente WHERE email='$email' and Password='$password'");
            $select1 = mysqli_query($connection, "SELECT * FROM Utente WHERE activated='0' and email='$email' and Password='$password'");
            if(mysqli_num_rows($select)==1){
                if(mysqli_num_rows($select1)==1){
                    $errors .= 'Account non attivato';
                }else{
                $result = mysqli_fetch_array($select);
                $_SESSION['member_id'] = $result['Id'];
                $_SESSION['Username'] = $result['Username'];
                header("location: index.php");
                }
            }else{
                $errors .= 'E-mail o password non corrette.';
            }
        }
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
      <div class="pos-fixed pos-center border bd-grayWhite rounded" style="width: 400px;">
          <h1 class="text-center">Entra nell'Azienda</h1>
          <h6 class="text-center"><?php echo $errors ?></h6>
          <h6 class="text-center"><?php echo $success ?></h6>
          <div class="pos-top-center" style="width: 300px;">
          <form method="POST" action="" id="">
          <input type="email" name="email" class="fields rounded" placeholder="e-mail" value="<?=((isset($email) )?$email:'')?>"/>
          <br>
          <input type="password" name="password" class="fields rounded" placeholder="Password" value="<?=((isset($password) )?$password:'')?>"/>
          <br>
          <input type="submit" value="Accedi" class="button primary rounded pos-bottom-center" name="loginBtn" />
          <br>
          </div>
          <div class="pos-bottom-center" style="width: 300px;">
            <hr>
          </div >
          <h6 class="text-center">Non hai un account? Chiedine uno all'amminstratore dell'Azienda.</h6>
          </form>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
