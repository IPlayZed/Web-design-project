<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    echo "Kijelentkezés...<br/>";

    session_unset();
    session_destroy();

    set_include_path("../php/home.php#top");
    require_once("fun_redirect_to_home.php");
    redirect_to_home(true);
?>