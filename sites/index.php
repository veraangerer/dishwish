<?php
    include "connection.php";
    include "header.php";
   
?>
        <section class="content">
            <?php //wenn man eingeloggt ist, erscheint ein Button zum Rezept hinzufügen
                if(isset($_SESSION['USER'])) echo '<a href="insert.php"><input type="submit" class="insertRecipe" value="Rezept hinzufügen"></a>';
                
             ?>
            <div id="container" class="js-masonry" data-masonry-options='{ "columnWidth": 200, "itemSelector": ".item" }'>
            <ul id="gallery">
                <?php
                    $recipe_pictures = array();
                    $sth = $dbh->query("SELECT r_id, picture AS Bild FROM recipes WHERE picture IS NOT NULL ORDER BY rand() LIMIT 9;"); 
                    //Ausgabe von 9 Random Bildern, die   mit dem jew. Rezept verlinkt sind.
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC))
                    {   
                        array_push($recipe_pictures, $row);
                    } 
                    for($i=0; $i<count($recipe_pictures); $i++)
                    {    
                            echo '<li class="item"><a href="recipe.php?id='.$recipe_pictures[$i]['r_id'].'"><img src="'.$recipe_pictures[$i]['Bild'].'"></a></li>';
                    }
                ?>
                </ul>
           </div>
            
        </section>
<?php
    include "footer.php";
?>