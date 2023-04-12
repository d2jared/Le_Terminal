<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    
<!-- formulaire -->
<br />
<br />
<form class="container" method="POST">
<?php  if(isset($errorMsg)){ echo '<p>' .$errorMsg. '<p>'; } ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot De Passe</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="validate">Se Connecter</button>
</form>
<br /><br />
<a href="signup.php"><p>Pas encore de compte ? inscris toi !</p></a>
</body>
</html>