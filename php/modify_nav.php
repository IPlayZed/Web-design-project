<?php
    header("Content-type: text/css"); 
        while (get_headers())    
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