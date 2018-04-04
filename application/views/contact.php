<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>AllSports | Contact</title>

    <link rel='stylesheet' type='text/css' href="<?= base_url();?>/css/style.css">
</head>

<body>
    <div class="page">

        <fieldset><legend><h2>Contact</h2></legend>
            <h3>Besoin d'une information ?</h3>
            <form action="mailto:aniskassy@gmail.com" method="post" name="contact">
                <br>
                <label for="login">Nom</label>
                <input id="Nom" name="Nom" placeholder="Nom" type="text" maxlength="15">
                <input class="btn" type="submit" value="Contacter AllSports !"></form>
        </fieldset>
<div class="rapport">
        <h2>Rapport</h2>

        <p><h3>I/ Introduction</h3><br><br>

Dans le cadre de la réalisation d’un projet à l’IUT Sénart-Fontainebleau, nous avons formé un binôme afin de développer une application web consacrée à la gestion d’équipes de sport. L’essence même du projet est la pratique du langage PHP (Hypertext Preprocessor) basée sur l’architecture MVC (Model-view-controller). Cette architecture divise l’application en trois modules principaux; le modèle (stocke les données manipulées par le programme), la vue (contient l’interface graphique et reçoit les actions de l’utilisateur) et le contrôleur (gère les intéractions entre modèles et vues). L’utilisation du framework CodeIgniter était réquise pour le développement de l’application. Il s’agissait là de notre première approche d’un framework. Nous avons attaqué l’accomplissement du projet vers mi-Mai et nous n’avons pas eu le temps d’accomplir la totalité du cahier des charges en mi-Juin. Nous avons utilisé 6 heures pour maîtriser CodeIgniter, 7 pour la réalisation des diagrammes, 4 pour le développement des pages HTML et CSS, 40 pour le développement des pages PHP. Bien entendu, les heures “perdues” ne sont pas prises en compte (la tentation de développement d’éléments hors de notre portée).
Au travers de la réalisation de notre projet, nous avons eu l’occasion de développer en utilisant des outils et méthodes professionnelles (GIT, architecture MVC, serveur distant). Autrement dit, ce projet nous a formé pour pouvoir débuter des projets professionnels de plus grande envergure. Il s’agit là d’un grand pas vers notre objectif professionnel qui nous est commun (à notre binôme), puisque nous souhaitons tous les deux travailler dans le secteur du développement web.
</p><br><br>
<p><br><h3>II/ Répartition des tâches dans le groupe</h3><br><br>

La configuration de CodeIgniter, l’HTML, le CSS, la page de contact, la déconnexion, la mise en ligne d’images (upload), la création d’équipes ont été développés par Anis en majeure partie.
La configuration de la base de données, l’ensemble des formulaires (connexion, inscription, gérer les équipes…), les profils... ont été développés par Mathilde en majeure partie.
Les tâches restantes ont été accomplies de façon plus ou moins équitables par notre binôme. Nous avons réalisé ensemble le formulaire pour la création d'événements.
</p><br><br>
<p><br><h3>III/ Particularités de notre application</h3><br><br>

En plus du cahier des charges, nous avons ajouté des fonctionnalités qui nous semblaient essentielles quant à une prise en main agréable de l’application.
Il y a un bouton déconnexion, qui détruit la variable de session et redirige vers la page d’accueil de notre application.
De plus, un bouton    permet de modifier son avatar.
Le bouton contact, disponible pour un utilisateur non authentifié, permettant d’ouvrir l’application Courrier (indisponible sous Linux, non testé sous Mac) avec comme destinataire notre adresse et comme pré-contenu du message le nom tapé dans le formulaire.
Nous avons ajouté une favicon et un titre de page, pour personnaliser notre site web.
Un utilisateur qui s’inscrit sans avatar se verra attribué d’un avatar par défaut. Il peut ainsi le modifier à partir de son profil.
Certains champs dans les formulaires sont requis.
Les mots de passe sont hachés.
Un entraîneur peut créer une événement seulement à partir de son profil.
L’utilisateur peut voir sur son profil dans quelles équipes il est administrateur, entraîneur et peut voir ses invitations à rejoindre une équipe. Il peut accepter ou refuser.
Un administrateur peut, en plus des fonctionnalités demandées, supprimer une de ses équipes, modifier une de ses équipes.

Nous avons un footer personnalisé.
</p><br><br>
<p><br><h3>IV/ Justification des éléments qui diffèrent de nos diagrammes initiaux</h3><br><br>

N’ayant qu’une vue globale du projet et n’ayant tapé aucune ligne de PHP, la réalisation de nos diagrammes était trop hasardeuse car nous n’avions que trop peu d’idées quant à la mise en pratique de nos tables que nous avons imaginées au début du projet.
Le diagramme “Contact” est erronné car nous avons préféré recevoir un mail de la part de l’expéditeur que des messages dans la base de données. 
La partie “Espace membre” n’existe plus. En effet, pour obtenir une organisation claire et érgonomique du header, il était préférable de ne pas passer par une page “Espace membre” et d’avoir accès en un clic aux fonctionnalités qui intéressent l’utilisateur.
Plusieurs noms de variables ont été modifiées, mais leur types et leur nombre sont les mêmes.
</p><br><br>
<p><br><h3>V/ Mise en relation entre ce que nous avons développé et ce que nous avons vu en cours</h3><br><br>
L’annexe de cette partie est disponible sur le lien suivant :
<a href="https://docs.google.com/spreadsheets/d/1nr6ZkzDVjs6HSG9e11RMY8csNebhWwUh7ULzqGq4Zks/edit?usp=sharing"> Ici </a>
</p><br><br>
<p><br><h3>VI / Conclusion</h3><br><br>

Comme notifié dans l’introduction, nous avons un projet professionnel commun consistant à se professionnaliser dans le développement web. Réaliser cette application web était une occasion  de confronter nos attentes à la réalité. CodeIgniter présente une documentation importante qui demande du temps pour être acquise. Autrement dit, débuter sur un framework est très long. Hormis cet aspect contraignant, réaliser ce site nous a conforté pour notre projet professionnel. 
Nous avions du mal à nous y lancer et à être confortable avec l’utilisation du framework et l’architecture MVC. Une fois que nous les avons “compris”, nous n’avions pas rencontré autant de difficultés à coder nos pages PHP qu’à coder en C ou Java.
La réalisation de ce projet est certes très longue, mais un bon moyen de tester nos capacités et avoir des ressentis vis à vis du développement web. Elle nous a été très bénéfique.
</p>
</div>
    </div>



    </body>


    </html>
