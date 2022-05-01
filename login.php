



<?php include('header.php') ?>

<body>
    

    <form name="frmConnexion" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <label>Login :</label>
            <input type="text" name="login">
        </div>
        <div>
            <label>Mot de passe :</label>
            <input type="password" name="password" value="">
        </div>
        <button type="submit">Connexion</button>

    </form>

<?php include('footer.php') ?>