<?php
    include "connection.php";

    /*
        Seite erstellt von
        Vera Karl
        E-Mail: vkarl-mmtb2014@fh-salzburg.ac.at
        Erstellt als Multimediaprojekt 1 im SS 2014/2015 an der Fachhochschule Salzburg.

        Studiengang: MultimediaTechnology
        Fachhochschule Salzburg GmbH
        Urstein Süd 1
        A-5412 Puch/Salzburg
        Österreich
        Tel.: +43 (0)7289 8646
        Fax: +43 (0)7289 8646-919
        http://www.fh-salzburg.ac.at

    */


//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

if (is_ajax()) {
	
	if (isset($_POST["recipes"]))
	{
		//recipes array extrahieren (JSON)
		$data = $_POST["recipes"];
		//SQL Abfrage
		if (count($_POST["recipes"]) == 3 )
		{	//Auswahl von 3 Zutaten
			$sth = $dbh->prepare("SELECT ri.r_id, r.recipename, r.picture FROM `recipes_ingredients` as ri, `recipes` as r
	                    WHERE ri.r_id = r.r_id AND ri.ing_ID = :ingID1 AND ri.r_id
	                     IN (
	                      SELECT r_id FROM `recipes_ingredients`
	                      WHERE  ing_ID = :ingID2 AND r_id
	                       IN (
	                         SELECT r_id FROM `recipes_ingredients`
	                         WHERE  ing_ID = :ingID3    
	                       ))");
	               $sth->bindParam(":ingID1", $data[0]);
	               $sth->bindParam(":ingID2", $data[1]);
	               $sth->bindParam(":ingID3", $data[2]);
	               $sth->execute();
	        
	                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	                    echo json_encode($result);
        }
        elseif (count($_POST["recipes"]) == 2 )
		{//Auswahl von 2 Zutaten
			$sth = $dbh->prepare("SELECT ri.r_id, r.recipename, r.picture FROM `recipes_ingredients` as ri, `recipes` as r
	                    WHERE ri.r_id = r.r_id AND ri.ing_ID = :ingID1 AND ri.r_id
	                     IN (
	                      SELECT r_id FROM `recipes_ingredients`
	                      WHERE  ing_ID = :ingID2
	                      )");
	               $sth->bindParam(":ingID1", $data[0]);
	               $sth->bindParam(":ingID2", $data[1]);
	               $sth->execute();
	        
	                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	                    echo json_encode($result);
        }
        elseif (count($_POST["recipes"]) == 1 )
		{//Auswahl von 1 Zutat
			$sth = $dbh->prepare("SELECT ri.r_id, r.recipename, r.picture FROM `recipes_ingredients` as ri, `recipes` as r
	                    WHERE ri.r_id = r.r_id AND ri.ing_ID = :ingID1
	                    ");
	               $sth->bindParam(":ingID1", $data[0]);
	               $sth->execute();
	        
	                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	                    echo json_encode($result);
        }
		
	}

}

?>