<?php
$mysqli = new mysqli("127.0.0.1:3306", "root", "goten008", "multijobs_wordpress");
$enlace = new mysqli("127.0.0.1:3306", "root", "goten008", "multijobs_wordpress");

function conectar()
{
    $enlace = new mysqli("127.0.0.1:3306", "root", "goten008", "multijobs_wordpress");
        return $enlace;
}
?>