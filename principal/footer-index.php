<div class="text-center">
  <?php
    $pag_anterior = $pagina_actual--;
    $pag_siguiente = $pagina_actual++;
    if($pagina_actual == 1){
      $pag_anterior = $pagina_actual;
    }
    if($pagina_actual == $total_paginas){
      $pag_siguiente = $pagina_actual;
    }
    echo "<a class='btn btn-info' href='index.php?pagina=1'>Primer p&aacutegina</a>";
    echo "<a class='btn btn-info' href='index.php?pagina=".$pag_anterior."'>P&aacutegina anterior</a>";
    echo "<a class='btn btn-info' href='index.php?pagina=".$pag_siguiente."'>P&aacutegina siguiente</a>";
    echo "<a class='btn btn-info' href='index.php?pagina=".$total_paginas--."'>&Uacuteltima p&aacutegina</a>";
  ?>
</div>
