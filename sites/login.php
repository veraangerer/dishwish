<?php
    include "connection.php";
    include "header.php";
?>
        <section class="content"> <!--neue Section Content : Inhalt der Seite-->

            <article>
                
                <h1>Login</h1>

                <!--Formular zum Einloggen, um danach Rezepte hinzuzufügen-->
                <form class="loginForm" action="login.php" method="POST">
                    <input type="text" name="user" placeholder="Username" required> <br />
                    <input type="password" name="password" placeholder="Password" required> <br />
                    <p><input class="login" type="submit" value="Log in" /></p>
                </form>
                
                <?php          
                        $username = $_POST["user"];//Username: verakarl
                        $passwort = $_POST["password"];//Password: vera

                        //Überprüfung, ob User und Passwort richtig sind
                        if ( strlen($username) > 0 and check_login( $username, $passwort ) ) 
                        { //check_login befindet sich in connection.php
                            $_SESSION['USER'] = $username;
                            header("Location: index.php");
                            exit;
                        }
                ?>

            </article>
                    <!--Ende Section Content-->
        </section>

<?php
    include "footer.php";
?>