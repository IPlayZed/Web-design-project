<?php
if(isset($_SESSION["username"])) {
    echo "<li><a href=\"personalrepo.php#top\">Saját gyűjtemény</a></li>";                           
    echo "<li><a href=\"profile.php#top\">Profilom</a></li>";
}
else {
    echo "<li><a href=\"reg.php#top\">Regisztráció</a></li>";
}
?>