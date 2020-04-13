<?php
//Ha nincs jelentkezve, akkor átirányítás bejelentkezésre.
if(!isset($_SESSION["username"])) {
    header("Location: login.php#top");
}
?>