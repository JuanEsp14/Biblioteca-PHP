</body>
</html>

<?php
  if(isset($_SESSION["session_username"])){
    mysqli_free_result($query_user);
    mysqli_close($link);
  }
?>
