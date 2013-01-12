<?php

/* Obtention d'une page (X)HTML5 minimale */
function debutPageHTML5($Titre) {
  echo "<!DOCTYPE html>\n<html lang=\"fr\" />\n <head>\n   <meta charset='utf-8' />\n   <title>$Titre</title>\n </head>\n <body>\n" ; 
}
/* la fonction fait écho, cad qu'elle écrit sur la page HTML la fin d'une page HTML */
function finPageHTML5() {
  echo " </body>\n</html>\n" ; 
}

/* appel de fonction */
debutPageHTML5("ajouter_membre") ; 

echo "<hgroup>\n<h1>Profil envoyé</h1>\n<h2>(affichage du tableau POST)</h2>\n</hgroup>\n" ;

/* itération sur le tableau qui est transmis pour visualiser l'environnement des variables et de leurs valeurs dans le tableau nommé $_POST */
foreach($_POST as $key=>$val) {
 echo  '<p>' .  $key . ' => ' .  $val . '</p>' ; 
 }

/* appel de fonction pour imprimer la fin du code HTML */ 
finPageHTML5() ; 


//Pour tester qu'il n'y a pas d'erreur dans l'envoi de la photo de profil 
if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
   //pour tester la taille du fichier, ici inférieur à 4 Mo
   if ($_FILES['photo']['size'] <= 4000000)
        { 
		// pour tester si l'extension est la bonne
                $infosfichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                 //validation et stockage du fichier 
                        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . basename($_FILES['photo']['name']));
                        echo "L'envoi a bien été effectué !";
                }
  
        }
}
?>