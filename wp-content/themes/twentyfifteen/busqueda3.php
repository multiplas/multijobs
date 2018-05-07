<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conectar();
$consulta_alumnos = "SELECT * FROM `anuncios` where titulo LIKE '%".$q."%'";
            $resultado = mysqli_query($mysqli,$consulta_alumnos);
            $num_total_registros = mysqli_num_rows($resultado);
            $TAMANO_PAGINA = 9;
            if(isset($_GET['pagina'])){
              $pagina = $_GET['pagina'];
               $inicio = ($pagina-1) * $TAMANO_PAGINA;
            }
            
            else{
              $inicio = 0;
              $pagina = 1;
               }
 	$consulta = "SELECT * FROM `anuncios` where titulo LIKE '%".$q."%' ORDER BY titulo";
	$result = mysqli_query($con,$consulta);
	$cuenta=0;
	while($fila=mysqli_fetch_assoc($result))
	{
              $var1 = $fila['id_anuncio'];
              echo '<a href="destino.php?anuncio='.$var1.'"><div class="oferta col-md-12">

                <h2>'.$fila['titulo'].'</h2>
                <p>'.$fila['cuerpo'].'</p>
                <p>Salario: '.$fila['salario'].' €</p>
                <p>Fecha de publicación: '.$fila['fecha'].' </p>
                </div></a><img class="separador" src="img/n_separador.png" alt="separador">
                ';
            
	}
	echo "<div class='col-xs-12'>";
            echo "<ul class='pagination'>";
            if(isset($total_paginas)){
            if ($total_paginas > 1) {
                  for ($i=1;$i<=$total_paginas;$i++) {
                    if($pagina == $i){
                      echo "<li class='disabled'><a href=#>".$i."</a>";
                    }
                    else
                        echo '<li>  <a href="ultimasofertas.php?pagina='.$i.'">'.$i.'</a> </li> ';
                  }
            }
        }
            echo "</ul>";
            echo "</div>";
        

?>