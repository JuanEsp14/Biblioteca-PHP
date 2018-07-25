<?php include('layout.php'); ?>

<?php if(User::logeado()) {
  if($user->rol == 'BIBLIOTECARIO'){
    include('./principal/index-bibliotecario.php');
  }else {
    include('./principal/index-usuario.php');
  }
}else{
  include('./principal/index-no-usuario.php');
}
?>

<?php mysqli_free_result($result); ?>

<?php include('footer.php') ?>
