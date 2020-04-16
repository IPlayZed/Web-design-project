<?php 
    if (!isset($_SESSION)) {
        session_start();
    } 
    set_include_path("../php");
    require_once("Account.php");
    require_once("fun_conv_rad.php");

    if(isset($_GET["SubmitTranslate"])) {
        $rotate_val_var=$_GET["rotate_val"];
        if ($_GET["rotate_unit"]=="rad") {
            $rotate_unit_rad=true;
        }
        else {
            $rotate_unit_rad=false;
        }
        
        //(A try-catch működik.)
        try {
            conv_rad($rotate_val_var,$rotate_unit_rad);
            $_SESSION["rotate_val"]=$rotate_val_var;
            echo $rotate_val_var."<br/>";echo $_SESSION["rotate_val"];

            if(isset($_SESSION["username"])) {
                setcookie($_SESSION["username"]."_rotate",$_SESSION["rotate_val"],time()+(15*365*24*60*60),"/");
                header("Location: animations.php#ex-rotated");
                exit();
            }
            else {
                setcookie("rotate",$_SESSION["rotate_val"],time()+(15*365*24*60*60),"/");
                header("Location: animations.php#ex-rotated");
                exit();
            }
        }
        catch(Exception $exc) {
            echo "<br/><span class=\"php-error\">Error: " . $exc->getMessage() . "</span>";
        }
    }   
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>A "nagy" CSS wiki</title>
        
        <link rel="stylesheet" type="text/css" href="../css/base.css"/>
        <link rel="stylesheet" type="text/css" href="../css/animations.css">
        
        <link rel="icon" type="image/png" href="../media/icons/Logo.png"/>

        <style>
            <?php
                if(isset($_SESSION["username"])) {
                    if(isset($_COOKIE[$_SESSION["username"]."_rotate"])) {
                        $temprotate=$_COOKIE[$_SESSION["username"]."_rotate"];
                        echo "#ex-rotated{transform: rotate($temprotate) !important;}";
                    }
                }
                else{
                    if(isset($_COOKIE["rotate"])) {
                        $temprotate=$_COOKIE["rotate"];
                        echo "#ex-rotated{
                            transform: rotate($temprotate"."deg);
                        }";
                    }
                }
            ?>
        </style>
        <script></script>     
    </head>

    <body>
        <div class="flex-column-container">
                
                <header id="top"> <!--Főcím-->
                        A &quot;nagy&quot; CSS wiki: kezdőlap
                </header> 
                    
                <nav> <!--Menü-->
                        <ul class="flex-row-container">
                            <li><a href="home.php#top">Kezdőlap</a></li>
                            <li id="current"><a href="animations.php#top">Animációk</a></li>
                            <?php require_once("modify_navbar.php"); ?>
                        </ul>
                </nav>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container">
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                    </ul>
                </aside> 

                <main class="flex-column-container">

                    <div class="flex-column-container">
                            <h1>Az animáció alapjai: a transzformációk</h1>
                                <div class="flex-column-container">
                                    <p>Az animációk egy alapkövét adják a transzformációk, melyek lehetnek 2 dimeziósak, illetve 3 dimenziósak.</p>
                                    <h2>A 2D transzformációk</h2>
                                    <div class="flex-column-container">
                                        <p>A 2D transzformációk alapját a <code>transform</code> és <code>transform-origin</code> tulajdonságok adják.</p>
                                        <ul>
                                            <li><code>transform</code> :értéke megadja, hogy milyen transzláció/transzformációk vonatkozzanak egy elemre.</li>
                                            <li><code>transform-origin</code> :segítségével tudjuk megváltoztatni a már <em>transzformált</em> elemek pozicióját.</li>
                                        </ul>
                                            <div class="flex-column-container">
                                                <div class="flex-column-container">
                                                    <h3>A transzláció/eltolás</h3>
                                                        <p>A transzláció/eltolás eltolja az objektumot adott mértékben az X-, illetve az Y-tengelyen.</p>
                                                        <div id="ex-non-translated">Normál</div>
                                                        <div id="ex-translated">Eltolt</div>
                                                </div>
                                                <div class="flex-column-container">
                                                    <h3>A rotáció/forgatás</h3>
                                                        <p>Elforgatja az elemet. A pozitív érékek az óramutató járásával megegyező, a negatívak ellentétes forgatást jelentenek.
                                                        (Pont a matematikai definícióval ellentétesen működik.) 
                                                        </p>
                                                        <div id="ex-non-rotated">Nomrál</div>
                                                        <div id="ex-rotated">Elforgatott</div><br/>
                                                        <form method="GET">
                                                            <label for="rotate_val">
                                                                <input type="text" name="rotate_val" placeholder="Elforgatás mértéke" required>
                                                            </label>
                                                            <label for="rotate_unit">
                                                                <select name="rotate_unit">
                                                                    <option value="deg">Fok</option>
                                                                    <option value="rad">Radián</option>
                                                                </select>
                                                            <label><br/>
                                                            <div class="flex-row-container">
                                                                <button type="submit" value="SubmitTranslate" name="SubmitTranslate">Transzformáció</button>
                                                                <button type="cancel" value="Reset" name="reset">Mégse</button>
                                                            </div>
                                                            <?php
     
                                                            ?>
                                                        </form>
                                                </div>
                                                <div class="flex-column-container">
                                                    <h3>A skálázás</h3>
                                                    <p>A skálázás lineárisan növeli egy elem szélességét és magasságát.</p>
                                                    <div id="ex-non-scaled">Nomrál</div>
                                                    <div id="ex-scaled">Skálázott</div>
                                                    <p>Érdekesség, hogy külön-külön lehet ezt ellítani, mert van csak az X vagy Y tengelyre vonatkozó függvény.</p>
                                                </div>
                                                <div class="flex-column-container">
                                                    <h3>A nyírás</h3>
                                                    <p>A mechanikából is ismert transzformáció itt is létezik. Az X és Y tengelyt a merőleges koordinátarendszerre forgatja el.
                                                       Érdekesség, hogy itt a matematikai definícióval megegyező a forgatás iránya. 
                                                    </p>
                                                    <div id="ex-non-skewed">Normál</div>
                                                    <div id="ex-skewed">Nyírt</div>
                                                    <p>Itt is megvannak a megfelelő csak X vagy Y tengelyre vonatkozó függvények.</p>
                                                </div>
                                            </div>
                                    </div>
                                        
                                </div>

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