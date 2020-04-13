<?php
    //Mivel regisztrálni csak akkor tud, ha még nincs bejelentkezve, így ebben az esetben elég ilyenkor beolvasni.
    //Létrehozok egy tömböt, megnyitom a felhasználói adatokat eltároló fájlt és kiolvasom belőle soronként 
    //a szöveget temporális változókban, kreálok egy új bejegyzést a konstruktorral a tömbben és növelem az indexet. 
    $accounts = [];
                                
    $readDB=fopen("../data/accounts.txt","r") or die("Could not open DB for read!");
    $i=0;
    while(!feof($readDB)) {
        $tempEmail=fgets($readDB);
        $tempUsername=fgets($readDB);
        $tempPassword=fgets($readDB);
        $tempBorn=fgets($readDB);
        $tempGender=fgets($readDB);
        //trim a whitespace eltávolításához
        $accounts[$i]=new Account(trim($tempEmail),trim($tempUsername),trim($tempPassword),trim($tempBorn),trim($tempGender));
        $i++;
    }
    $currentindex=count($accounts)-1;
?>