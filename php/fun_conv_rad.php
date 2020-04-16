<?php
    function conv_rad($val, $is_rad) {
        if(!is_numeric($val)) {
            throw new Exception("Csak szám lehet a bemenet!");
        }
        else {
            if($is_rad==true) {
                $val*=57.2958;
                return $val;
            }
            else {
                return $val;
            }
        }
    }
?>