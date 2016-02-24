<?php

    include "config.php";
   

    if( !$DB_NAME ) die('please create config.php, define $DB_NAME, $DB_USER, $DB_PASS there');

    try {
        $dbh = new PDO($DSN, $DB_USER, $DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,            PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        $dbh->exec('SET CHARACTER SET utf8') ;
    } catch (Exception $e) {
        die("Problem connecting to database $DB_NAME as $DB_USER: " . $e->getMessage() );
    }
	
	function check_login($username, $passwort)
	{
			 if($username == "verakarl" && $passwort == "vera")
			 {
				return true;
			 }
			return false;
	}
	
	session_start();

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
?>
