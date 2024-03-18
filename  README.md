# Calculateur d'impôt

Ce projet est une application Web simple permettant de calculer l'impôt en fonction du revenu annuel d'une personne.

## Description

L'utilisateur entre son nom et son revenu annuel dans un formulaire. L'application calcule ensuite l'impôt basé sur les tranches définies (15 % pour les revenus <= 15 000 euros et 20 % au-delà) et affiche le montant de l'impôt.

## Installation

Ce projet a été réalisé avec la version 8.3 de PHP.

1. Vérifiez que votre fichier ini colle avec le mien (php.ini), en cas de problème, vous pouvez trouver le mien dans web/php.ini.

2. Accédez à `index.php` depuis votre navigateur pour démarrer l'application. 
3. Ou lancez le server docker avec la commande `docker-compose up -d` et accédez à `http://localhost:8080` depuis votre navigateur.


## Partie DOCKER

1. Je me suis permis de rajouter un système d'hébergement de site Web avec Docker pour plus de fluidité. 
De plus, j'ai rencontré quelques problèmes de mise à jour de CSS. La mise en place de ce service a permis toute éradication de bug et de mise en place de nouvelles fonctionnalités.

# Guide d'utilisation Docker Compose pour le TD_impot

Ce fichier `docker-compose.yml` configure les services nécessaires pour le développement et le déploiement de l'application similaire à Trello dans le cadre du projet SAE. Ci-dessous, vous trouverez une description de chaque service ainsi que les instructions pour les utiliser.

## Service

### Apache

- **Description**: Serveur web Apache avec PHP 8.2 pour héberger l'application web.
- **Image Docker**: `php:8.2-apache`.
- **Nom du conteneur**: `apache_td_nocika`.
- **Volumes : Changer le volume actuel avec le chemin absolu de votre projet**.
- **Port**: Le port `8080` de l'hôte est mappé au port `80` du conteneur, rendant l'application accessible via `http://localhost:8080`.


## Comment utiliser ce service

Pour démarrer l'ensemble des services définis dans ce fichier `docker-compose.yml`, exécutez la commande suivante dans un terminal, après vous être placé dans le répertoire contenant le fichier :

```sh
docker-compose up -d
```

Cette commande initiera le téléchargement des images Docker nécessaires, créera et démarrera les conteneurs en mode détaché.

Pour arrêter et supprimer tous les services ainsi que les conteneurs associés, utilisez la commande :

```sh
docker-compose down
```

Veillez à avoir Docker installé et opérationnel sur votre machine avant d'exécuter ces commandes.

## Utilisation

Remplissez le formulaire sur la page principale avec votre nom et votre revenu annuel, puis cliquez sur OK pour voir le montant de l'impôt calculé.
Si la base de données n'est pas crée elle se crée toute seule localement lors de la première utilisation.

Pour vérifier les données enregistrées dans la BDD, double clique sur import.sqlite3 et exécute la commande suivante:

```sql
SELECT * FROM RESULT
 ```


## Difficultés rencontrées

Peu de difficultés rencontrées lors de la réalisation de ce projet. J'ai eu un peu de mal à comprendre comment fonctionne la base de données SQLite3, mais après quelques recherches, j'ai pu comprendre comment l'utiliser.

Niveau de difficulté : 2/10

