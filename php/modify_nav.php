<?php
    header("Content-type: text/css"); 
    if (isset($_SESSION["username"])) {
        $disptype="flex";
    }
    else {
        $disptype="none";
    }
?>
nav ul li:nth-child(3) {
    display:<?=$disptype?> !important;
}