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

//Inclusion des dépendances
include 'includes/header.php'; 

//Inclusion des dépendances
require 'config.php'; 

// Déclaration des varaibles 
$keyword; 



?>

<body>

<form action="" method="get">
    <input type="text" name="keyword" placeholder="Nom de l'auteur">
    <button name="Search"> Rechercher</button>

</form>
    







</body>

 


<?php 
//Inclusion des dépendances
include 'includes/footer.php'; 
?>