<?php
    function redirect_to_home($is_logout=false) {
        echo "Visszairányítás a kezdőlapra 3 másodpercen belül.";
        if($is_logout==false) {
            header('Refresh: 3; URL=home.php#top');
        }
        if($is_logout==true) {
            header('Refresh: 3; URL=../pages/home.php#top');
        }
    }
?>