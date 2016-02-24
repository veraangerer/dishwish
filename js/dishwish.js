/*oggle-Funktion für das Ein-und Ausklappen der Kategorien*/
    $(document).ready(function(){
		 $("#filters-toggle").click(function(){
			 $(".categoryForm").toggle();
		 	});
		});


    $(document).ready(function() {
        //Wert des Radiobuttons finden und den Button auf gechecked setzen
            var radioID = "#radio" + "<?php if(isset($_POST['c_ID'])) echo $_POST['c_ID']; ?>";
            if (radioID != "#radio") $(radioID).attr('checked', 'checked');
    });

   //from impressum.php
    $container.masonry('bindResize');//masonry-Gallery anpassen an die Fenstergröße

    $(document).ready(function() {
    $("#radio_submit").click(function (e) {
        var radio = $('input:radio[name=user_options]:checked').val();
   
        if(checked_option_radio===undefined)
            {
                alert('Bitte eine Kategorie auswählen!');
            }
            else
            {
                alert(checked_option_radio);
            }
     });
    });

