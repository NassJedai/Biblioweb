<?php 

/** 
*  1 Connexion à la base de donnée  
*  2 Recherche des livres en fonction des noms d'auteurs 
*  3 Affichage des résultats 
*
* @author Nassim Jedai 
* @version 0.1, 1 mai 2022  
*/

// Définition du Titre 
$titre = 'BiblioWeb';

//Inclusion du header
include 'includes/header.php'; 

//Inclusion des constantes pour la BD
require 'config.php'; 

// Déclaration des varaibles 
$keyword; 
$message = ''; 
$books = [];
$Btsearch;

// Si l'utilisateur à rentrer quelque chose 
// if (!empty($_GET['keyword'])) {
//     $keyword = ($_GET['keyword']);
// }

// Si l'utilisateur a appuyé sur le boutton 
if((isset($_GET['Btsearch'])) && (!empty($_GET['keyword'])) ) {
    $Btsearch = ($_GET['Btsearch']);
    $keyword = ($_GET['keyword']);

    if ($Btsearch) {
        // Connexion à la base de donnée 
        $db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD); 
    
        if($db) {
            // Sélection de la base de donnée 
            if(@mysqli_select_db($db, DATABASE)) {
                // Préparation de la requete 
                if(!empty($keyword)) {
                    $query = "SELECT * FROM books 
                    INNER JOIN authors on author_id = authors.id 
                    WHERE authors.lastname ='$keyword'";
    
                    //Envoie de la requete
                    $result = mysqli_query($db, $query); 
                    
                    if($result) {
                        // Extraction des résultats 
                        while ($book = mysqli_fetch_assoc($result) != null) {
                            $books [] = $book;
                        }
                        // Libération de la mémoire 
                        mysqli_free_result($result);
                         var_dump($books); 
    
                    } else {
                        $message = 'Erreur de requête !';
                    }
    
                } else {
                    $message = 'Nom d\'auteur inconnu !';
                }
    
                
            } else {
                $message = 'Erreur de sélection de la BD !';
                }
    
                // Fermeture de la connexion 
                mysqli_close($db);
    
            
    
        } else {
            $message = 'Erreur de connexion de la BD !';
        }
    }; 
}

   


?>

<body>
<div><?= $message; ?></div>
<form action="<?= $_SERVER['PHP_SELF']?>" method="get">
    <input type="text" name="keyword" placeholder="Nom de l'auteur">
    <input type="submit" name="Btsearch"></input>
</form>
    







</body>

 


<?php 
//Inclusion du footer
include 'includes/footer.php'; 
?>