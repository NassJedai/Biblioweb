Pour l'ensemble des points ci-dessous, veillez à effectuer un traitement sécurisé des données venant du client et de la source externe.
Au départ du projet Biblioweb étudié au cours, vous disposez des scripts index.php, login.php, header.php, footer.php, config.php et de la sauvegarde de la base de données biblioweb.sql présents sur le serveur.
Veuillez implémenter les scénarios suivants :
AA2 - Sélectionner des données venant de la source externe
AA3 - Générer un ensemble de pages web contenant un contenu dynamique intégrant formulaires et résultats
F1 – Un internaute peut rechercher les livres d’un auteur donné.
•	Dans une nouvelle page nommée search.php, lorsque l’utilisateur entre le nom d’un auteur, puis clique sur le bouton Rechercher du formulaire
o	enregistrez sa recherche dans sa session de façon à retenir uniquement les 3 dernières recherches effectuées ;
o	affichez dynamiquement la liste des livres de l’auteur donné, en séparant chaque auteur homonyme (même nom).

 Dick			Rechercher	


Philip K. Dick
•	Blade Runner
•	En attendant l’année dernière
•	Minority Report
•	Paycheck
•	Ubik

Francis Dick
•	Dead Cert

Requête utile
SELECT * FROM `books` JOIN authors ON author_id=authors.id WHERE authors.lastname='Dick' ORDER BY author_id

S1 – Le système affiche les résultats de la page d’accueil de façon dynamique en appliquant les styles CSS définis dans un fichier au format JSON.
•	Lisez le fichier JSON presets.json et récupérez les données de la clé homestyles,
•	Transformez ces données dans un format CSS valide,
•	Incorporez dynamiquement le code CSS obtenu dans un passage de style interne,
•	Ajoutez les classes CSS adéquates au titre et à l’auteur du livre.

AA3 - Générer un ensemble de pages web contenant un système de navigation
A1 – Un administrateur connecté peut voir un menu de navigation administrateur.
•	Créer le menu de navigation représenté ci-dessous.
o	Gérer les auteurs
o	Gérer les emprunts
o	Promouvoir un membre
•	Faites en sorte que seul un utilisateur connecté dont le statut est admin ne puisse voir le menu administrateur dans le pied de page ;
•	À ce stade, les liens doivent rester indéterminés.

AA1 - Envoyer des informations venant du client vers le serveur et les traiter
AA2 - Sélectionner et modifier les données sur la source externe
A2 – Un administrateur connecté peut promouvoir ou rétrograder un membre.
•	Créez la page de gestion des utilisateurs dans un fichier nommé users.php composé au moyen des fragments header.php et footer.php ;


Bob	novice		Promouvoir		

Fred	habitué		Promouvoir			Rétrograder	

Lara	expert					Rétrograder	


•	Lorsque l’administrateur clique sur le lien Promouvoir un membre (voir énoncé précédent),
o	Affichez la liste des membres (login et statut) au moyen du script users.php ;
o	Affichez un bouton libellé Promouvoir et/ou un bouton libellé Rétrograder
	un membre dont le statut est expert ne peut plus être promu ;
	un membre dont le statut est novice ne peut plus être rétrogradé ;
	affichez uniquement les boutons adéquats pour chaque membre.
	Faites en sorte de changer l’état du membre lorsque l’administrateur clique sur le bouton Promouvoir ou Rétrograder sachant que la hiérarchie est la suivante : novice, habitué, expert ;
o	Faites en sorte que l’administrateur ne puisse pas changer l’état d’un même utilisateur plus de 2 fois par session (il devra se déconnecter pour faire plus) ;
o	Veuillez afficher un message de notification spécifique pour tous les cas.

•	Sécurisez cette fonctionnalité de façon à ce que seul un administrateur connecté puisse l’exécuter même si un autre internaute modifie directement l’URL.

Liste des requêtes SQL utiles
SELECT id, login, statut FROM users
UPDATE users SET statut='habitué' WHERE id=1
