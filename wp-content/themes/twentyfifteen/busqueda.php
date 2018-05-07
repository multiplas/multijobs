<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conectar();
$consulta_alumnos = "SELECT * FROM `alumno` where nombre LIKE '%".$q."%'";
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
 	$consulta = "SELECT * FROM `alumno` where nombre LIKE '%".$q."%' ORDER BY nombre";
	$result = mysqli_query($con,$consulta);
	$cuenta=0;
	while($fila=mysqli_fetch_assoc($result))
	{
		$var1 = $fila['idalumno'];
	echo '<a href="individuo.php?individuo='.$var1.'"><div class="ver_alumno col-sm-6 col-md-4">
                <img src="'.$fila["imagen_perfil"].'" class="img_perfil" width="100%" height="220"/>
                <h4>'.$fila['nombre'].' '.$fila['apellidos'].'</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
                  <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                  <br>Ut enim ad minim veniam, quis nostrud</p>
              </div></a>';
            
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
                        echo '<li>  <a href="ver-alumnos?pagina='.$i.'">'.$i.'</a> </li> ';
                  }
            }
        }
            echo "</ul>";
            echo "</div>";
        

?>