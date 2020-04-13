<?php
//Ha be van jelentkezve, akkor átirányítás profilra.
if(isset($_SESSION["username"])) {
    header("Location: profile.php#top");
}
?>