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



## Auteurs
Bencheikh Sabrina 
Bouaziz Mohammed Amine 


