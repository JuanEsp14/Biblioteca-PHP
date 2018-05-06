<footer>
  <div class="container">
    <button type="button" class="btn"><a href="index.php"> Primer P&aacutegina</a></button>
    <button type="button" class="btn">P&aacutegina Anterior</button>
    <button type="button" class="btn">P&aacutegina Siguiente</button>
    <button type="button" class="btn">&Uacuteltima P&aacutegina</button>
</div>
</footer>
</body>
</html>

<?php
  if(isset($_SESSION["session_username"])){
    mysqli_free_result($query_user);
    mysqli_close($link);
  }
?>
