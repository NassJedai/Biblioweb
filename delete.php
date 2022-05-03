<?php 


//Inclusion des constantes pour la BD
require 'config.php'; 

// Si l'utilisateur a appuyé sur le button 'supprimer' et qu'il a donné une ref

if (isset($_POST['btDelete'])) {
    
    if(!empty($_POST['ref'])) {
        $ref = ($_POST['ref']); 

        // Connexion à la base de donnée 
        $db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD); 
        
        if($db) {
            // Sélection de la base de donnée 
            if(@mysqli_select_db($db, DATABASE)) {

                // Préparation de la requête: nettoyer les données entrantes​
                $ref = mysqli_real_escape_string($db, $_POST['ref']);

                // Préparation de la requete 
                $query = "DELETE FROM `books` WHERE `books`.`ref`='$ref'";
    
                //Envoie de la requete
                $result = mysqli_query($db, $query); 
                var_dump($result);
                    
                if($result) {
                    if(mysqli_affected_rows($db)>0) {
                        $_SESSION['message'] =  "Modification réussie.";
                    } else {
                        $_SESSION['message'] =  "Aucune suppression.";
                    }
                    // Extraction des résultats 

                    // var_dump($book);
                    
                    // Libération de la mémoire 
                    mysqli_free_result($result);
                            
                    // Fermeture de la connexion 
                    mysqli_close($db);

                } else {
                    $message = 'Erreur de requête !';
                }

    
            } else {
                $message = 'Erreur de connexion de la BD !';
            }




        } else {
            $message = 'introduisez une référence !';
        }

    }

}


?>