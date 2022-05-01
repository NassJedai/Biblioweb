
<?php ; 
include ('config.php');


// déclaration des varirables


if (!empty($_POST['submit'])) {
    
    if (!empty($_POST('nomAuteur'))) {

    }


} else  {
    $message = "Veuillez entrer un nom d'auteur ! ";
}



include ('config.php');

// Connexion au serveur Mysql 
$bd = @mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die('Erreur de connexion');


if($bd) {

    // Sélectionner la base de donnée 
    if (mysqli_select_db($bd, 'biblioweb')) { 

        // préparer une requête  

        $nomAuteur = mysqli_real_escape_string($bd, $title);

        $query = "SELECT * FROM books WHERE title = '$title'";

        

        //Envoyer la requête   
        $result = mysqli_query($bd, $query);

        // Extraire les résultats 
     $title = (mysqli_fetch_row($result));
        
      echo '<pre>';
       var_dump($books);
       '</pre>';
       echo '</pre>';

        mysqli_free_result($result);

        mysqli_close($bd);


    }

    
};
?>



<?php include('header.php') ?>

<body>
    

    <form name="searchBook" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <label>Nom d'auteur  :</label>
            <input type="text" name="nomAuteur" placeholder="écrivez un nom d'auteur">
        </div>

        <button type="submit">Rechercher</button>
    </form>

    <p> <?= $message ?> </p>
<?php include('footer.php') ?>