<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Dishwish</title>

    <!-- add Masonry - GridSystem -->
    <script src="../js/masonry.pkgd.js/"></script>
    <script src="../js/diswish.js/"></script>

    <!-- add JQuery from Google -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />

        <!--
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
    -->
    <script>
    //from cook.php - doesn't work if I put it in an extra js-File
    function getrecipes(array) {
        if (array.length > 0 && array.length < 4) {
            var jsonarray = JSON.stringify(array);
            var data = {
                "recipes": array
            };
            $('.loaderImage').show();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "getrecipes.php",
                data: data,
                success: function(data) {
                  
                  $('#showrecipes').empty();

                  if (data.length > 0) 
                  {
                      for (var i = 0; i < data.length; i++) {
                          $('#showrecipes').append('<div class="item"><a href="recipe.php?id=' + data[i].r_id + '"><img style="width:300px" src="'+ data[i].picture +'">'+ data[i].recipename +'</a></div>');
                      };
                  }
                  else 
                  {
                        $('#showrecipes').append('<div><h2>Zu dieser Zutatenkombination ist leider kein Rezept vorhanden!</h2></div>');
                  }
                  $('.loaderImage').hide();

                },
                error: function(data, req, textStatus, errorThrown) {
                 //   alert(">.<");
                 //   console.log("data: " + data + '\n');
                 //   console.log("req: " + data + '\n');
                 //   console.log("textStatus: " + data + '\n');
                 //   console.log("errorThrown: " + data + '\n');
                }

            }); //end  ajax
        } //end if
        else 
        {
             $('#showrecipes').empty();
        }
    } //end function



    /*Wert der Checkbox auslesen, um danach festzustellen, welches Rezept zu den ids passt*/
        $(document).ready(function() {
            var selected = [];
            $( ".ingCheck" ).click(function() {
                selected = [];
                $(".ingCheck:checked").each(function() { 
                    selected.push($(this).val());
                });            
                getrecipes(selected);
        });       
    });
    </script>
    
</head>
<body>
    <div id="wrap">

        <section class="header"> <!--Header mit Navigationsmenü, das sich bei der Änderung der Fenstergröße anpasst-->
            
            <nav id="mainnav" class="clearfix toggled-on">
              <div class="container-fluid">
            <!--! Brand and toggle get grouped for better mobile display-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> <!--navbar header-->

            <div id="logo">
                <img src="../img/logo.png" alt="Logo DishWish"> <!--Logo der Seite-->
            </div>

                 <div class="collapse navbar-collapse in" id="bs-example-navbar-collapse-1" aria-expanded="true">
                        <ul class="nav-menu" class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="category.php">Kategorien</a></li>
                            <li><a href="login.php">Login</a></li>
                        <?php 
                            if(isset($_SESSION['USER'])) echo '<li><a href="logout.php">Logout</a></li>';   
                            //Nach dem Einloggen erscheint ein Logout-Button im Menü  
                        ?>
                            <li><a href="cook.php">Kühlschrank-Kochen</a></li>
                        </ul>
                 </div><!--collapse navbar-->
            </div><!--container fluid-->

            <div id="slogan"><h3>student cooking, easy going</h3></div><!--Slogan der Seite-->

        </nav>

        </section>
