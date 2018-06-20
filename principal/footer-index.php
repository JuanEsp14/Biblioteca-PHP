<div class="text-center">
  <?php
    $pag_anterior = $pagina_actual - 1 ;
    $pag_siguiente = $pagina_actual + 1;
    if($pagina_actual == 1){
      echo "<a class='btn btn-info disabled' href='#'>Primer p&aacutegina</a> ";
      echo "<a class='btn btn-info disabled' href='#'>P&aacutegina anterior</a> ";
    }else{
      echo "<a class='btn btn-info' href='index.php?pagina=1'>Primer p&aacutegina</a> ";
      echo "<a class='btn btn-info' href='index.php?pagina=".$pag_anterior."'>P&aacutegina anterior</a> ";
    }
    if($pagina_actual == $total_paginas){
      echo "<a class='btn btn-info disabled' href='#'>P&aacutegina siguiente</a> ";
      echo "<a class='btn btn-info disabled' href='#'>&Uacuteltima p&aacutegina</a> ";
    }else{
      echo "<a class='btn btn-info' href='index.php?pagina=".$pag_siguiente."'>P&aacutegina siguiente</a> ";
      echo "<a class='btn btn-info' href='index.php?pagina=".$total_paginas."'>&Uacuteltima p&aacutegina</a> ";
    }
  ?>
</div>
