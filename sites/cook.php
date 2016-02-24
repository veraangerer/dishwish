<?php
    include "connection.php";
    include "header.php";
?>
        <section class="content">

            <article>
                
                <h1>Kühlschrank-Kochen</h1>
                <p>Wählen Sie die gewünschten Zutaten aus(höchstens 3 vers. Zutaten), die Sie zum Kochen verwenden wollen. Die Rezepte die zu den Kombinationen passen, werden dann unten angezeigt.</p>

                <form>
                    <ul id="ingredientslist">
                	<?php #Auslesen der Zutatennamen für die Auswahl
                            $ingredients = array(); 
                            $sth = $dbh->query("SELECT ing_ID, name FROM ingredients;");
                            while($row = $sth->fetch(PDO::FETCH_OBJ))
                            {
                                        $ingredients[] = $row;
                            }
                            for($i=0; $i<count($ingredients); $i++)
                            {   
                                 echo '<li><label for="checkbox'.$ingredients[$i]->ing_ID.'"><input class="ingCheck" type="checkbox" id="checkbox'.$ingredients[$i]->ing_ID.'" value="'.$ingredients[$i]->ing_ID.'">'.$ingredients[$i]->name.'</label></li>';
                                
                            }         
                     ?>
                        
                     </ul>
                </form>
                <?php
                    //Beim Laden der Rezepte wird das gif-angezeigt, damit der Betrachter erkennen kann, dass der Ladevorgang gestart wurde.
                    echo '<div class="loaderImage"><img src="../img/ajaxloader.gif" alt="LoaderGif for AJAX Request"></div>';
                    $result = $sth->fetchAll(PDO::FETCH_OBJ);
                    //Ausgabe der Rezepte mit den gewünschten Zutaten
                    echo '<div id="showrecipes">';
                    for($i=0; $i<count($result); $i++)
                    {    
                            echo '<div class="loaderImage"><img src="../img/ajaxloader.gif" alt="LoaderGif for AJAX Request"></div>'; //Beim Laden der Rezepte wird das gif-angezeigt, damit der Betrachter erkennen kann, dass der Ladevorgang gestart wurde.
                            echo '<div class="item"><a href="recipe.php?id='.$result[$i]->r_id.'"><img src="'.$result[$i]->picture.'"></a></div>';
                    }
                    echo '</div>';
                    

               ?>
            </article>

        </section>
<?php
    include "footer.php";
?>