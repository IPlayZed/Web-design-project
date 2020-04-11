<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    set_include_path("../php");
    echo "session:" .isset($_SESSION);
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!--A viewport szélességét az eszköz képernyőszélességnek állítja be, 1-szeres nagyítás.-->
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>A "nagy" CSS wiki</title>
        
        
        <link rel="stylesheet" type="text/css" href="../css/base.css"/>
        <link rel="stylesheet" type="text/css" href="../css/home.css"/>
        <link rel="stylesheet" media="print" href="../css/print.css" />
        <!--<link rel="stylesheet" type="text/css" media="screen" href="../php/modify_nav.php"/>-->
        
        <link rel="icon" type="image/png" href="../media/icons/Logo.png"/>

        <style></style>
        <script></script>     
    </head>

    <body>
        <div class="flex-column-container">
                
                <header id="top"> <!--Főcím-->
                        A &quot;nagy&quot; CSS wiki: kezdőlap
                </header> 
                    
                <nav> <!--Menü-->
                        <ul class="flex-row-container">
                            <li id="current"><a href="home.php#top">Kezdőlap</a></li>
                            <li><a href="animations.php#top">Animációk</a></li>
                            <li><a href="personalrepo.php#top">Saját gyűjtemény</a></li> <!--Majd itt lehet kiválasztani a sütikbe elmentett animációkat/stílusokat.-->
                            <?php
                            //Ha nem vagyunk bejelentkezve, akkor Regisztráció.
                            if(isset($_SESSION["username"])) {                               
                                echo "<li><a href=\"profile.php#top\">Profilom</a></li>";
                            }
                            else {
                                echo "<li><a href=\"reg.php#top\">Regisztráció</a></li>";
                            }
                            ?>
                        </ul>
                </nav>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container"> <!--Haznos külső linkek-->
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                    </ul>
                </aside> 

                <main class="flex-column-container">
                        <div class="flex-column-container"> <!--Rövid bemutatás-->
                            <h1>Mi az a CSS?</h1>
                                    <ul>
                                        <li>
                                            A Cascading Style Sheets-et rövidíti. 
                                        </li>
                                        <li>
                                            A CSS leírja, hogy hogyan nézzenek ki a HTML tagok.
                                        </li>
                                        <li>
                                            Nagyon diverz módon lehet kombinálni, az objektumorientált nyelvekhez hasonlóan az 
                                            örkölődés segítségével sok munkát meg lehet takarítani.
                                        </li>
                                    </ul>
                        </div>

                        <div> <!--Rövid történelem-->
                            <h1>A CSS története</h1>
                                <p> 
                                    A stílusleíró nyelvek már a 90-es évek eleje óta léteznek, de akkoriban jeletősen más volt a felhasználása.
                                    Egyes böngészők hoztak létre saját stílusleíró nyelveket. Megjelentek standardok is, mint például a 
                                    DSSSL, vagy a FOSI, melyek nem támogatták azt, hogy egy HTML dokumentumhoz több mint egy CSS stíluslap tartozzon.
                                </p>
                            <h2>A CSS atyjai</h2>
                            <div class="flex-row-container flex-pf-center" id="gallery">
                                <figure class="flex-column-container">
                                    <img src="../media/pictures/330px-Håkon-Wium-Lie-2009-03.jpg" alt="Håkon Wium Lie, a CSS atyja"/>
                                    <figcaption>Håkon Wium Lie, a CSS atyja</figcaption>
                                </figure>
                                <figure class="flex-column-container">
                                    <img src="../media/pictures/Bert_Bos_1.jpg" alt="Bert Bos a társ-atyja a CSS-nek">
                                    <figcaption>Bert Bos, a CSS társ-atyja</figcaption>
                                </figure>
                            </div> 
                                <p>
                                    A HTML népszerűségének magában hordozta a komplex igények kialakítását is. Egyik ilyen volt, hogy lehessen a weblapok
                                    megjelenésén változtatni. Sajnos a HTML kódba ágyazott stílusleírás nem vezetett fenntartható kódra, arról nem is 
                                    beszélve, hogy minden böngésző picit máshogyan jelenítette meg az elemeket. A megoldást 
                                    Håkon Wium Lie ajánlása jelentette először 1994 Októberében
                                    a CSS megalkotására. 2 évvel később, 1996-ban az első W3C CSS ajánlás megszületett és a CSS1 lett az legelső verziója a CSS-nek.
                                </p>
                        </div>

                        <div> <!--CSS verziók bemutatása táblázatban-->
                            <table id="t1">
                                <thead>
                                    <tr>
                                        <tr id="tr1">
                                        <th id="var">Variáció</th><th id="leir">Leírás</th>
                                        </tr>
                                    <tr>
                                </thead>

                                <tbody>
                                    <th id="CSS1">CSS 1</th>
                                    <td headers="CSS1,leir">
                                    1996 December 17-én lett publikálva. Håkon Wium Lie és Bert Bos az eredeti fejlesztői.<br>Fontosabb tulajdonságai: <br>
                                    <ul>
                                    <li>Betűtípus tulajdonságok pl. typeface és emphasis</li>
                                    <li>Szöveg, háttér és más elemek színe</li>
                                    <li>Szöveg tulajdonságok: szó/betű/sor-táv</li>
                                    <li>Szöveg, kép, táblázat és más elemek igazítása</li>
                                    <li>Margó, keret, térköz és pozicionálás a legtöbb elemhez</li>
                                    <li>Egyedi azonosító és általános osztályozás tulajdonságcsoportoknak</li> 
                                    </ul>
                                    </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                    <th id="CSS2">CSS 2</th>
                                    <td headers="CSS2,leir">
                                    A W3C fejlesztette és publikálta 1998 májusában.<br>CSS2 több új képességgel is bővült, mint pl.:<br>
                                    <ul>
                                    <li>Elemek abszolút,relatív és rögzített pozícionálása ,és a z-index</li>
                                    <li>Médiatípusok fogalma</li>
                                    <li>Aural styles sheet támogatása</li>
                                    <li>Kétirányú szöveg</li>
                                    <li>Új betűtípus tulajdonságok mint pl. árnyékok</li>
                                    </ul>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                    <th id="CSS2.1">CSS 2.1</th>
                                    <td headers="CSS2.1,leir">
                                    CSS 2 hibáinak javítása, gyengén támogatott vagy nem teljesen működőképes funkciók eltávolítása, már implementált 
                                    böngésző kiegészítők hozzáadása. CSS 2.1 oda-vissza ugrált Working Draft és W3C Candidate Recommendation státusz között több évig
                                    majd végül 2011 Június 7-én publikálták W3C Recommendation néven.
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                    <th id="CSS3">CSS 3</th>
                                    <td headers="CSS3,leir">
                                    CSS 2-vel ellentétben a CSS 3 több különálló dokumentumra/"modulokra" van felosztva.
                                    Minden modul új funkciókat ad hozzá vagy bővíti a CSS 2-ben definiáltakat, megőrizvén a visszafelé való kompatibilitást.
                                    A CSS 3 munkálatai nagyjából már az eredeti CSS 2 recommendation publikálásakor kezdődtek. Az első CSS 3 
                                    vázlatokat 1999 Júniusában publikálták.<br>A modularizálásból kifolyólag különböző modulok stabilitása 
                                    és státusza eltérő. Némely modul Candidate Recommendation(CR) státuszban van és nem tekinthető teljesen stabilnak.
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                    <th id="CSS4">CSS 4</th>
                                    <td headers="CSS4,leir">
                                    Nincs egyedülálló, integrált CSS 4 specifikáció mert több különálló, egymástól független modulra van osztva.<br>
                                    CSS Level 2-re épülő modulok Level 3-ban kezdődtek, ezekből néhány már elérte a Level 4-et vagy már a Level 5-höz közelít.
                                    Teljesen új funkcionalitást defináló modulok (pl. a Flexbox) Level 1 -ként lettek jelölve, ezekből néhány Level 2-höz közelít.
                                    </td>
                                    </tr>
                                </tbody>
                                    
                            </table>
                        </div>
                </main>
            </div>
            
            <footer>
                <div class="flex-column-container">
                    <div>
                        <div id="footer-left">Készítette: Illés Árpád és Börcsök Balázs Róbert</div>
                        <div id="footer-right">A "nagy" CSS wiki&copy;</div>
                    </div>
                </div>

                <div class="flex-row-container">
                    Social media:
                        <a href="https://github.com/IPlayZed?tab=repositories" target="_blank" class="tooltip flex-row-container">
                            <img src="../media/pictures/borcsokbalazsrobert_stackoverflow_profile.jpg" alt="Börcsök Balázs Róbert: StackOverflow" >
                            <span class="tooltip-text">GitHub</span>
                        </a>
                </div>
            </footer>

        </div>  
    </body>
    
</html>