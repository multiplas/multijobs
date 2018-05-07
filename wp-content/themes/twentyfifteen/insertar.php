<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<h1>Para Familias</h1>
	<?php 
	include "conexion.php";
	$sentenciaMYSQL="INSERT INTO `familias` (`id_familia`, `nombre_familia`) VALUES (NULL, ?);";
#preparamos la consulta

//FORMULARIO
echo "<br/><br/>";
echo "<form action='#' method='POST'>";
echo "Nombre de la familia: <input type='text' name='nombre_familia'/><br/>";
echo "<input type='submit' value='Enviar'>";
echo "</form>";


$actuacion=mysqli_prepare($mysqli,$sentenciaMYSQL);


# asgnamos valores al paramentro puntos
if(!empty($_POST['nombre_familia']))
{
	mysqli_stmt_bind_param($actuacion,'s', $nom);
$nom=$_POST['nombre_familia'];
echo "El nombre es:" .$nom;
mysqli_stmt_execute($actuacion);
/* el contador de modificaciones es una propiedad distinta al contador
de resultados de una consulta */
print "Se han efectuado".mysqli_affected_rows($mysqli)."actualizaciones";
}
echo "<br/>";

	?>
	</form>

		<h1>Para ciclos</h1>
	<?php 
	$sentenciaMYSQL2="INSERT INTO `ciclo` (`idciclo`, `nombre_ciclo`) VALUES (NULL, ?);";
#preparamos la consulta

//FORMULARIO
echo "<br/><br/>";
echo "<form action='#' method='POST'>";
echo "Nombre del ciclo: <input type='text' name='nombre_ciclo'/><br/>";
echo "<input type='submit' value='Enviar'>";
echo "</form>";

$actuacion2=mysqli_prepare($mysqli,$sentenciaMYSQL2);


# asgnamos valores al paramentro puntos
if(!empty($_POST['nombre_ciclo']))
{
mysqli_stmt_bind_param($actuacion2,'s', $nom2);
$nom2=$_POST['nombre_ciclo'];
echo "El nombre es:" .$nom2;
mysqli_stmt_execute($actuacion2);
/* el contador de modificaciones es una propiedad distinta al contador
de resultados de una consulta */
print "Se han efectuado".mysqli_affected_rows($mysqli)."actualizaciones";
}
echo "<br/>";

	?>
	</form>



		<h1>Para Fps</h1>
	<?php 
	$sentenciaMYSQL3="INSERT INTO `fp`(`id_fp`, `nombre_fp`, `idciclo`, `id_familia`) VALUES (null,?,?,?);";
#preparamos la consulta

//FORMULARIO
echo "<br/><br/>";
echo "<form action='#' method='POST'>";
echo "Nombre del fp: <input type='text' name='nombre_fp'/><br/>";
?>
<select name="ciclo2" class="is_required validate account_input form-control" onchange="muestralocalidad()" required>
            <option value="0"> -- Elegir ciclo -- </option>
          <?php    
              $consulta = "SELECT * FROM ciclo ORDER BY nombre_ciclo";
              $result = mysqli_query($mysqli,$consulta);
              $cuenta=0;
              while($fila=mysqli_fetch_assoc($result))
              {
                echo "<option value=".$fila['idciclo'].">".$fila['nombre_ciclo']."</option>";
              }
            ?>
          </select>
     <?php ?>
<br><br><select name="familia2" class="is_required validate account_input form-control" onchange="muestralocalidad()" required>
            <option value="0"> -- Elegir familia -- </option>
          <?php    
              $consulta = "SELECT * FROM familias ORDER BY nombre_familia";
              $result = mysqli_query($mysqli,$consulta);
              $cuenta=0;
              while($fila=mysqli_fetch_assoc($result))
              {
                echo "<option value=".$fila['id_familia'].">".$fila['nombre_familia']."</option>";
              }
            ?>
          </select>
     <?php
echo "<input type='submit' value='Enviar'>";
echo "</form>";




# asgnamos valores al paramentro puntos
if(!empty($_POST['nombre_fp']))
{
	$actuacion3=mysqli_prepare($mysqli,$sentenciaMYSQL3);
mysqli_stmt_bind_param($actuacion3,'sii', $nom2,$ciclo,$familia);
$nom2=$_POST['nombre_fp'];
$ciclo = $_POST['ciclo2'];
$familia = $_POST['familia2'];
mysqli_stmt_execute($actuacion3);
/* el contador de modificaciones es una propiedad distinta al contador
de resultados de una consulta */
print "Se han efectuado".mysqli_affected_rows($mysqli)."actualizaciones";
}
echo "<br/>";

	?>
	</form>

</body>
</html>