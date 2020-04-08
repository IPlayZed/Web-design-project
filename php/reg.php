<?php session_start() ?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!--A viewport szélességét az eszköz képernyőszélességnek állítja be, 1-szeres nagyítás.-->
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>Regisztráció</title>
        
        <link rel="stylesheet" type="text/css" href="../css/base.css">
        <link rel="stylesheet" type="text/css" href="../css/reg.css"/>
        
        <link rel="icon" type="image/png" href="../media/icons/Logo.png"/>

        <style></style>
        <script></script>     
    </head>

    <body>
        <div class="flex-column-container">
                
                <header id="top"> <!--Főcím-->
                        A &quot;nagy&quot; CSS wiki: Regisztráció
                </header> 
                    
                <nav> <!--Menü-->
                        <ul class="flex-row-container">
                            <li><a href="home.php#top">Kezdőlap</a></li>
                            <li><a href="animations.php#top">Animációk</a></li>
                            <li><a href="personalrepo.php#top">Saját gyűjtemény</a></li> <!--Majd itt lehet kiválasztani a sütikbe elmentett animációkat/stílusokat.-->
                            <li><a href="profile.php#top">Profilom</a></li>
                        </ul>
                </nav>
            </div>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container">
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                    </ul>
                </aside>
                <main>
                    <form class="flex-column-container flex-pf-center" method="POST">
                        <label for="email">E-mail<br>
                            <input type="email" id="email" name="email" value="E-mail" required></label>
                        <label for="usr">Felhasználónév<br>
                            <input type="text" id="usr" name="usr" value="Felhasználónév" required></label>
                        <label for="pw">Jelszó<br>
                            <input type="password" id="pwd" name="pwd" value="" required></label>
                        <label for="pwd_again">Jelszó újra<br>
                            <input type="password" id="pwd_again" name="pwd_again" value="" required></label>
                        <label for="date">Születési dátum<br>
                            <input type="date" name="date" value="01/01/0000" min="1900-01-01"></label>
                        <label for="gender">Neme<br>
                            <select id="gender" name="gender">
                                <option value="not_set">Nincs megadva</option>
                                <option value="male">Férfi</option>
                                <option value="female">Nő</option>
                                <option value="helo">Helikopter</option>
                                <option value="train">Tehervonat</option>
                            </select><hr>
                        </label>
                        <div id="div_button" class="flex-row-container">
                            <button type="submit" value="Elfogad" name="elkuld">Elfogad</button>
                            <button type="reset" value="Reset" name="reset">Mégse</button>
                        </div>
                        <?php
                         //lecsekkolom h minden mező ki van e töltve
                            class Account {
                                private $email;
                                private $username;
                                private $password;
                                private $born;
                                private $gender;

                                public function setEmail($email) {
                                    $this->$email = $email;
                                }
                                public function setUsername($username) {
                                    $this->$username = $username;
                                }
                                public function setPassword($password) {
                                    $this->$password = $password;
                                }
                                public function setBorn($born) {
                                    $this->$born = $born;
                                }
                                public function setGender($gender) {
                                    $this->$gender = $gender;
                                }

                                public function getEmail() {
                                    return $this->$email;
                                }
                                public function getUsername() {
                                    return $this->$username;
                                }
                                public function getPassword() {
                                    return $this->$password;
                                }
                                public function getBorn() {
                                    return $this->$born;
                                }
                                public function getGender() {
                                    return $this->$gender;
                                }
                            }
                            
                            $accounts = [$admin=new Account(), $test=new Account()];

                            //most ez ideiglenes, fájlból lesz importálva
                            $accounts["admin"]->setEmail("adminemail@gmail.com");
                            $accounts["admin"]->setUsername("admin");
                            $accounts["admin"]->setPassword("password");
                            $accounts["admin"]->setBorn("23/12/2000");
                            $accounts["admin"]->setGender("male");

                            if (isset($_POST["elkuld"])) {                                
                                $email = $_POST["email"];
                                $username = $_POST["usr"];
                                $password = $_POST["pwd"];
                                $password_again = $_POST["pwd_again"];
                                $born = date("d/m/Y", strtotime($_POST["date"]));
                                $gender = $_POST["gender"];
                            }
                        ?>                        
                    </form>
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