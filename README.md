# Projet TVSeries (master 2 e-services)
## Jérôme Verlyck

### Description

Application de visualisation de séries et de leurs épisodes. Lorsqu'on est pas connecté, l'utilisateur peut consulter les séries et les épisodes
associés. Lorsqu'il est connecté, il peut ajouter de nouvelles séries ainsi que des épisodes. Il peut également signaler les épisodes qu'il a déjà visionné
et celui en cours de visionnage.

En tant qu'admin, on peut modifier/supprimer les séries et les épisodes.

L'application utilise le bundle fosuserbundle pour la gestion des utilisateurs et le bundle fixturesbundle pour la mise en place de jeu de données de test.

### Commandes

**Commande pour générer la base de données**

php app/console doctrine:schema:update --force

**Commande pour les fixutres**

php app/console doctrine:fixtures:load

**Commande pour créer les utilisateurs**

admin: php app/console fos:user:create Admin admin@admin.com Admin

user: php app/console fos:user:create User user@user.com User

**Passer l'utilisateur Admin en ROLE_ADMIN**

php app/console fos:user:promote Admin ROLE_ADMIN
