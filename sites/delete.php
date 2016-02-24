<?php
    include "connection.php";
    include "header.php";  
?>
        <section class="content">

            <article>
 
            <?php  
                    //Löschen des Rezeptes mit der übergegebenen ID
                 if( isset($_GET['id']) && isset($_SESSION['USER']) ) {
                    try{
                       $stm = $dbh->prepare( "DELETE FROM recipes WHERE r_id LIKE :id;");
                       $stm->bindParam(":id", $_GET['id'] );
                       $stm->execute();
                       echo "Rezept erfolgreich gelöscht";
                    }

                    catch( Exception $e ) 
                    {
                        echo "Rezept konnte nicht gelöscht werden";
                        exit;
                    }
                }

            ?>
 

            </article>

        </section>
<?php
    include "footer.php";
?>