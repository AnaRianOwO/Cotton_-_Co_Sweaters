<?php

$DB = new mysqli("localhost", "root", "", "cotton");

    if ($DB->connect_errno){
        echo "No hay conexión: (".$DB->connect_errno.")".$DB->connect_error;
    }

?>