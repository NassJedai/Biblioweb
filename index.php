<?php 

/** 
*  1. Connexion à la base de donnée  
*  2. Recherche des livres en fonction des noms d'auteurs 
*  3. Affichage des résultats 
*  4. Création d'app qui permet de modifier et de supprimer
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



// Si l'utilisateur a appuyé sur le boutton ainsi qu'un nom d'auteur
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
                           // var_dump($book);
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


<section>
    <?php foreach ($books as $book) { ?>
        <article>
            
            <figure>
                <img src="<?= $book['cover_ulr'] ?>" alt="<?= $book['title'] ?>" width="100">
                <figcaption><?= $book['title'] ?></figcaption>
            </figure>

            <p><?= $book['description'] ?></p>
            <p><a href="edit.php?ref=<?= $book['ref'] ?>">Modifier</a></p>

            <form action="delete.php" method="post">
                <input name="ref" value="<?= $book['ref'] ?>">
                <button name="btDelete">Supprimer</button>
            </form>

        </article>
        <?php } ?>
</section>
    
</body>
<?php 
//Inclusion du footer
include 'includes/footer.php'; 
?>