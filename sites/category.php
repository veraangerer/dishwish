<?php
    include "connection.php";
    include "header.php";
?>

        <section class="content">
        	 <h1>Kategorien</h1>
           
            <article>


                <p>Bitte wählen Sie  1 Kategorie aus, um die gewünschten Rezepte anzuzeigen.</p>

				<!-- Kategorie -->
			<form class="categoryForm"  id="categoryForm"  action="category.php" method="post" onchange="submit">
			 <div class='filter-grid-item'>
    			<ul id="id_dishtype">
    			<li><label for="radio1" ><input id="radio1" name="c_ID" type="radio" value="1" onchange="this.form.submit()"/>Pasta</label></li>
    			<li><label for="radio2"><input id="radio2" name="c_ID" type="radio" value="2" onchange="this.form.submit()"/> Gemüse</label></li>
    			<li><label for="radio3"><input id="radio3" name="c_ID"type="radio" value="3" onchange="this.form.submit()"/> Fleisch</label></li>
    			<li><label for="radio4"><input id="radio4" name="c_ID" type="radio" value="4" onchange="this.form.submit()"/> Suppe</label></li>
    			<li><label for="radio5"><input id="radio5" name="c_ID" type="radio" value="5" onchange="this.form.submit()"/> Brainfood</label></li>
    			<li><label for="radio6"><input id="radio6" name="c_ID"  type="radio" value="6" onchange="this.form.submit()"/> Reis</label></li>
                <li><label for="radio7"><input id="radio7" name="c_ID" type="radio" value="7" onchange="this.form.submit()"/> Fisch</label></li>
                <li><label for="radio8"><input id="radio8" name="c_ID"  type="radio" value="8" onchange="this.form.submit()"/> Dessert</label></li>
                <li><label for="radio9"><input id="radio9" name="c_ID"  type="radio" value="9" onchange="this.form.submit()"/> Salat</label></li>
                <li><label for="radio10"><input id="radio10" name="c_ID"  type="radio" value="10" onchange="this.form.submit()"/> Vegetarisch</label></li>
    			</ul>
			 </div>    
			</form>

            <?php
                if (isset($_POST['c_ID']))
                {
                    $c_id = $_POST['c_ID'];
                    $sth = $dbh->query("SELECT * FROM recipes as r, recipes_category as rc
                                        WHERE rc.c_ID = $c_id 
                                        AND rc.r_id = r.r_id
                                        LIMIT 9;"
                                        ); 
                    //Ausgabe von höchstens 9  Bildern, die in der gewählten Kategorie sind.
                    $result = $sth->fetchAll();

                    foreach($result as $row)
                    {    
                            echo '<a class="recipelink" href="recipe.php?r_id='.$row->r_id.'"><img style="width:300px" src="'.$row->picture.'">'.$row->recipename.'</a>';
                    }
                   
                }

            ?>

            </article>

        </section>
<?php
    include "footer.php";
?>