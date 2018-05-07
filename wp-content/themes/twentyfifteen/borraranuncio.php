<?php 
include "conexion.php";

$sql = "DELETE FROM anuncios WHERE id_anuncio=".$_POST['idanuncio']." ";

if ($mysqli->query($sql) === TRUE) {
    echo "Anuncio eliminado con éxito";
} else {
    echo "Error eliminando el anuncio: " . $mysqli->error;
}

$mysqli->close();

?>