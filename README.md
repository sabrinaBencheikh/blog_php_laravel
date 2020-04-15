## Blog Laravel M2 MIASHS DCISS

ceci est un projet réalisé en travaux pratique avec M.Florian Rodriguez et M.Pierre blare pour le module Programmation web coté serveur en utilisant le framework Php Laravel .

## Pré-requis

* PHP 7.2.5
* Framework Laravel 7.0
* Laravel tinker 2.0
* Composer (gestionnaire de dépendances) 
* Sqlite 3.22.0

## Installation
Afin d'installer le projet sur votre machine suivez les étapes suivantes 
1. Décompressez le fichier zip (blog_php_laravel-master.zip) dans le répertoire de votre choix 
2. Créez le fichier "database.sqlite" dans le répertoire "blog_php_laravel-master/database/"
3. Ouvrez le répertoire du projet avec "visual-studio" ou autres éditeur de texte
4. Renommez le fichier ".env.example"  en  ".env" puis ouvrez le 
5. modifiez la ligne 9 et 12 du fichier ".env" de sorte a avoir ce résultat 

                                                        DB_CONNECTION=sqlite
                                                        DB_DATABASE= /chemin/vers/l-application/database/database.sqlite

6. Ouvrez le Terminal et positionnez vous sur le répertoire du projet 
7. Exécutez les commandes suivantes 

            composer install 
            php artisan key:generate
            php artisan migrate
            php artisan db:seed 
            php artisan serve 
            
8. Vous pouvez maintenant accéder au projet sur localhost:8000 :)



## découvrez le blog 

Dans cette partie vous trouverez tous ce qu'on a implémenté et le guide pour tester toutes les fonctionnalités

## Home 
 > l'url de cette page [home](http://localhost:8000/home)
est composé d'un corps contenant les 3 derniers articles publiés 
et une barre de navigation contenant les bouton suivant : 

 * **Home** : dirige vers la page [Home](http://localhost:8000/home) où on peut trouver les trois derniers articles postés(selon la date d'ajout du post).
 * **Article** : dirige vers la page [Article](http://localhost:8000/Articles) où on peut trouver tous les articles sur deux pages  
 * **Contact** : dirige vers la page [Contact](http://localhost:8000/Contacts) où on peut contacter les administrateur duite
 * **Login** : dirige vers la page [login](http://localhost:8000/login), dans cette page on peut s'identifier (mail et mots de passe ) 
 * **Register** : dirige vers la page [register](http://localhost:8000/register), dans cette page on peut créer un compte utilisateur) 

## Afficher la liste des articles 
Dans la page [Article](http://localhost:8000/Articles)

## Afficher un article 
 Dans la page [Home](http://localhost:8000/home) et [Article](http://localhost:8000/Articles), on peut afficher un article en cliquant sur le titre de l'article souhaité
une fois l’article affiché plusieurs fonctionnalités s'offre à nous selon qu'on soit connecté ou non:
		*mode invité(non authentifié) : on peut consulté le contenu des articles, si on essaye de commenté ou de créer un nouveau article,on seras redirigé vers la page d'authentification
		*mode connecté : on peut: ajouter des commentaires sur des articles, les modifiés ou les supprimés, on peut aussi modifié le contenu d'un article, commentaire, ou le supprimé si nous sommes propriétaire, 
					 

## créer un article 
depuis la page [Article](http://localhost:8000/Articles) on peut consulter la liste intégrale de ses derniers sur plusieurs pages (numéro de pages pour naviguer en bas de page ) en haut de chaque page on pourras créer un nouvel article en cliquant sur le bouton **Nouvel Article** qui nous redirigeras vers un formulaire de création d'un article, 
créée une instance de la classe Article.

## modifier un article / suprimer  un article 
sur la page d'affichage d’un article , si nous sommes propriétaire de l'article ou des commentaires sur un articles des boutons de modification ou de suppression s’afficheront sur la partir haute a droite, pour permettre la suppression ou la modification de l'article. Ce bouton est un lien vers la fonction édit du controller ArticlesController@edit qui nous redirigera vers une vue d'un formulaire de modification de l'article en question.
Une fois que les modifications souhaitées sont apportées, on valide par un button submit et le formulaire sera envoyer à Articlescontroller@update ou seront mis à jours les champs modifiés. Ces modification seront ensuite enregistrées dans la base de donnée et vous serez redirigé vers la page de l'article en question et qui va évidament s'afficher après modification.

## Valider un formulaire / Commentaire
chaque formulaire de création ou de modification d'un article fera object d'une validation grace aux Requests et nottament au RequestArticle qui vérifira que le champs obligatoire sont remplis. autrement une erreur sera afficher nottant les champs manquant qui sont obligatoires.

## Proteger nos articles / commentaires

Grace aux @can('update') et @can('delete'), nous avons pu protéger nos articles et nos en créant des policies qui renvoie vrai que si l'utilisateur en cours est l'auteur des articles en question. Il faut également inserer $this->authorize('update', $post) dans chaque fonction edit, delete, update de chacun des controller Articles et Comments

## commentaires

Nous avons également developper les crud pour les commentaires de la méme facon que pour les articles, cependant nous avons rajouter une option de réponse à un commentaire. Pour celà il nous a fallu créer des champs commentable_id et commentable_type dans la table commentaire. Ensuite nous avons créé la fonction commentable dans le model Comment dans lequel nous avons spécifié qu'un commentaire pouvait avoir plusieurs commentaires grace ala fonction morphMany() et également en créant la fonction comment() pour définir les cardinalités ainsi que la fonction qui nous permet de l'avoir.

## Connecter/Créer un compte
Depuis toutes les pages du sites (Home, Article, Contact) on peut accéder à la page login ou register, en cliquant sur le bouton **login** ou **Register**  positionné sur partie droite de la barre de navigation.
Une fois dans la page login on doit remplir le formulaire de connexion pour s'identifier (si nous possédons déjà un compte)
si non la page register nous permettras de créer un compte en remplissant le formulaire d'inscription.

Une fois connecté un bouton de déconnexion est affiché à la place du bouton "se connecter" permettant à l'utilisateur de se déconnecter depuis toutes les pages 

## Profil utilisateur
Nous avons créer un UserController qui nous permet de gérer le profil utilisateur une route resource pour eventuellement gérer les crud pour le profil. Cependant nous n'avns développer que la partie affiche du profil utilisateur.
En effet, nous avons ajouter un lien dans la barre déroulente de connexion pour un utilisateur logued qui lui permettra d'accéder à son profil. Nous avons créé une view profil vers lequel le User controller redirigera la demande d'acc_s au profil grace a la méthode show.






## Auteurs
Bencheikh Sabrina 
Bouaziz Mohammed Amine 












