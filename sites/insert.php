<?php
    include "connection.php";
    include "header.php";
?>
        <section class="content">

            <article>
             
                <h1>Rezept einfügen</h1>

                <form class="recipeform" action="" method="POST">
                     <input type="text" name="recipename" placeholder="Rezeptname"> <br />
                    <label for="Zubereitung"> Zubereitung:</label><br>
                            <textarea name="preparation" cols="34" rows="5"></textarea>
                            <br>
                     <select>
                      <?php #Auslesen der Zutatennamen für die Auswahl
                         $ingredients = array(); 
                            $sth = $dbh->query("SELECT * FROM ingredients;");
                            while($row = $sth->fetch(PDO::FETCH_OBJ))
                            {
                                        $ingredients[] = $row;
                            }
                            for($i=0; $i<count($ingredients); $i++)
                            {    
                                  echo '<option name="ing_ID">'.$ingredients[$i]->name.'</option>';
                            }
                      
                         ?>
                         
                     </select> 
                     <input type="number" name="amount" placeholder="Menge" min="0.5" max="1000"> 
                     <input type="text" name="unit" placeholder="Einheit"> <br />
                     <select>
                         <?php #Auslesen der Zutatennamen für die Auswahl
                          $ingredients = array(); 
                            $sth = $dbh->query("SELECT * FROM ingredients;");
                            while($row = $sth->fetch(PDO::FETCH_OBJ))
                            {
                                        $ingredients[] = $row;
                            }
                            for($i=0; $i<count($ingredients); $i++)
                            {    
                                  echo '<option name="ing_ID">'.$ingredients[$i]->name.'</option>';
                          }
                       
                         ?>
                     </select>
                     <input type="number" name="amount" placeholder="Menge" min="0.5" max="1000"> 
                     <input type="text" name="unit" placeholder="Einheit"> <br />
                     <select>
                         <?php #Auslesen der Zutatennamen für die Auswahl
                           $ingredients = array(); 
                            $sth = $dbh->query("SELECT * FROM ingredients;");
                            while($row = $sth->fetch(PDO::FETCH_OBJ))
                            {
                                        $ingredients[] = $row;
                            }
                            for($i=0; $i<count($ingredients); $i++)
                            {    
                                  echo '<option name="ing_ID">'.$ingredients[$i]->name.'</option>';
                           }
                  
                         ?>
                     </select>
                
                    <input type="number" name="amount" placeholder="Menge" min="0.5" max="1000"> <br />
                    <input type="text" name="unit" placeholder="Einheit"> <br />

                     <div class='filter-grid-item'>
                        <ul class="dishtype">
                        <li><label for="id_dishtype_0"><input id="radio1" name="c_ID" type="radio" value="1" />Pasta</label></li>
                        <li><label for="id_dishtype_1"><input id="radio2" name="c_ID" type="radio" value="2" /> Gemüse</label></li>
                        <li><label for="id_dishtype_2"><input id="radio3" name="c_ID"type="radio" value="3" /> Fleisch</label></li>
                        <li><label for="id_dishtype_3"><input id="radio4" name="c_ID" type="radio" value="4" /> Suppe</label></li>
                        <li><label for="id_dishtype_4"><input id="radio5" name="c_ID" type="radio" value="5" /> Brainfood</label></li>
                        <li><label for="id_dishtype_5"><input id="radio6" name="c_ID"  type="radio" value="6" /> Reis</label></li>
                        <li><label for="id_dishtype_5"><input id="radio7" name="c_ID" type="radio" value="7" /> Fisch</label></li>
                        <li><label for="id_dishtype_5"><input id="radio8" name="c_ID"  type="radio" value="8" /> Dessert</label></li>
                        <li><label for="id_dishtype_5"><input id="radio9" name="c_ID"  type="radio" value="9" /> Salat</label></li>
                        <li><label for="id_dishtype_5"><input id="radio10" name="c_ID"  type="radio" value="10" /> Vegetarisch</label></li>
                        </ul>
                    </div>   
                     <p><input class="insertRecipe"  name="insert" type="submit" value="Rezept einfügen" /></p>   
            </form>

            <form class="ingform" action="" method="POST">
                <input type="text"  name="name" placeholder="Zutat">
                <input type="submit" name="addIng" value="Zutat hinzufügen"><br />
            </for
            <?php  
                   if(isset($_POST['insert']))
                    {
                       
                        //Einfügen eines neuen Rezepts
                        
                        $recipename = $_POST['recipename'];
                        $preparation = $_POST['preparation'];
                        //ing_ID = $_POST['ing_ID']; muss nicht übergeben werden, weil dies automatisch geschieht(bei Auswahl der Zutat wird sofort die ing_ID mitgespeichert)
                        $amount = $_POST['amount'];
                        $unit = $_POST['unit'];
                        $c_ID = $_POST['c_ID'];
                    try 
                    {
                        //Einfügen in die Tabelle recipes
                        $dbh->beginTransaction(); // $dbh PDO defined in connection.php
                        $recipe = $dbh->prepare("INSERT INTO recipes (r_id , recipename ,preparation ,picture) VALUES (NULL ,?,?,'../img')");
                        $recipe->execute(array($recipename, $preparation));

                        //Einfügen in die Tabelle recipes_ingredients
                        $r_id = $dbh->lastInsertId();//function from PDO -> vorher mysql_insert_id aus der mySQL Extension
                               
                        $ing_recipe = $dbh->prepare("INSERT INTO recipes_ingredients (r_id, ing_ID ,amount,unit) VALUES(?,?,?,?)");
                        $ing_recipe->execute(array($r_id, /*$ing_ID,*/ $amount, $unit));
                        
                        //Einfügen in die Tabelle recipes_category
                        //$r_id = $dbh->lastInsertId();
                        $recipe_cat = $dbh->prepare("INSERT INTO recipes_category (r_id,c_ID) VALUES(?,?)");
                        $recipe_cat->execute();
                      
                        $dbh->commit();

                        echo"Rezept hinzugefügt";

                    }
                    
                    catch (Exception $e)
                    {
                        //$recipe->rollback();
                        //$ing_recipe->rollback();
                        //$recipe_cat->rollback();
                        $dbh->rollback();

                    }

                  }

                        if(isset($_POST['addIng']))
                        {  //Einfügen einer neuen Zutat
                            try
                            {
                              $dbh->beginTransaction();
                              $name = $_POST['name'];
                              $addIng = $dbh->prepare("INSERT INTO ingredients (name) VALUES(?)");
                              $addIng->execute(array($name));
                              $dbh->commit();
                              echo "Zutat hinzugefügt!";
                            }
                            catch (Exception $e)
                            {
                               $dbh->rollback();
                            }
                        }
            ?>
 

            </article>

        </section>
<?php
    include "footer.php";
?>