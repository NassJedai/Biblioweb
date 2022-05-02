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
$message; 
$books = [];

// Si l'utilisateur à rentrer quelque chose 
if(!empty($_GET['keyword'])) {
    $keyword = ($_GET['keyword']);
}


// Connexion à la base de donnée 

$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD); 

if($db) {
    // Sélection de la base de donnée 
    if(mysqli_select_db($db, DATABASE)) {
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

            } else {
                $message = 'Erreur de requête !';
            }

        } else {
            $message = 'Nom d\'auteur inconnu !';
        }

        
    } else {
        $message = 'Erreur de sélection de la BD !';
        }

} else {
    $message = 'Erreur de connexion de la BD !';
}

 //var_dump($books); 



?>

<body>
<?= $message; ?>
<form action="" method="get">
    <input type="text" name="keyword" placeholder="Nom de l'auteur">
    <button name="Search"> Rechercher</button>
</form>
    







</body>

 


<?php 
//Inclusion du footer
include 'includes/footer.php'; 
?>