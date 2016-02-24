<?php
    include "connection.php";  
    include "header.php";
?>

        <section class="content">

            <article>
        
            <?php
                $r_id = $_GET['id'];
                //Namen auslesen für Gericht --> r_id ändern
                $r = $dbh->query( "SELECT * FROM recipes WHERE r_id=$r_id")->fetch(); 
                echo '<h1>'.$r->recipename.'</h1>';

                //Bild auslesen für Gericht --> r_id ändern
                echo '<a href="recipe.php?id="><img src="'.$r->picture.'"></a>';

                //Ausgabe der Zutatennamen, Einheiten und Mengen pro Rezept
                $recipe = array();  
                $sth = $dbh->query("SELECT ri.amount, ri.unit, i.name AS  zutat FROM  recipes r JOIN  recipes_ingredients  ri ON  ri.r_id = r.r_id JOIN  ingredients i ON  i.ing_ID = ri.ing_ID WHERE  r.r_id = $r_id;");
                while($row = $sth->fetch(PDO::FETCH_OBJ))
                {
                    $recipe[] = $row;
                }
                echo '<ul class="ingredients">';
                for($i=0; $i<count($recipe); $i++)
                {    
                            
                            echo '<li>'.$recipe[$i]->amount.' '.$recipe[$i]->unit.' '.$recipe[$i]->zutat.'</li>';
                            //print_r($recipe[$i]);
                }
                $info = "Zutaten für 1 Person";
                echo '<p>'.$info.'<p>';
                echo '</ul>';

                //Ausgabe der Zubereitung
                echo '<p>'.$r->preparation.'</p>';

                if(isset($_SESSION['USER'])) echo '<a href="delete.php?id='.$r_id.'"><input type="submit" class="insertRecipe" value="Rezept löschen"></a>'; //Nach dem Einloggen erscheint ein Button zum Löschen           
            ?>            
              
            </article>

        </section>

<?php
    include "footer.php";
?>