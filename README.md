## Romain Lavayssiere B3
### Compte déjà existant pour tester (toujours possibilité d'inscrire un utilisateur)
- email : paya@paya.paya
- password : payapaya
# Gestion de Tâches Collaborative - Laravel

## Description du Projet
Chaque utilisateur peut :
- **Créer, modifier, supprimer** ses propres tâches.
- **Gérer le statut** de ses tâches (À faire, En cours, Terminé).
- **S'inscrire et se connecter** avec un système d'authentification sécurisé.

## Choix Techniques

###  **1. Framework : Laravel**
- Laravel a été choisi pour accélérer le développement.

###  **2. Base de Données : MySQL**
- Modèle relationnel avec les tables :
  - `users (id, name, email, password, created_at)`
  - `tasks (id, title, description, status, user_id, created_at)`

###  **3. Sécurité et Autorisation**
- Utilisation de Laravel Policies (`TaskPolicy`) pour empêcher un utilisateur d'accéder aux tâches d’un autre.
- Protection des routes avec middleware `auth`.

###  **4. Gestion de Git**
L'utilisation de Git a permis un développement structuré en versionnant chaque étape.
- L'initialisation
- L'ajout des models / premières features
- Fix des features + ajout de nouvelles
- Ajout de la documentation

### **5. Choix techniques**
- Le modèle `User` représente les utilisateurs du système. Il gère l’authentification et les relations avec les tâches.
- Le modèle `Task` représente une tâche et gère son association avec un utilisateur.

- Mise en place de controller pour séparer les responsabilités : chaque contrôleur gère un module spécifique -> Meilleure organisation du code.

- Laravel Blade permet de séparer la logique métier et l’affichage et de réutiliser des layouts pour structurer l’interface.

- Routes sécurisées avec middleware(['auth']) et utlisation de Route::resource() qui simplifie la gestion du CRUD.

- Gestion de la bdd via des migrations -> simplifie la gestion de la bdd (pas besoin de faire du SQL)

- Les Policies permettent de sécuriser l’accès aux tâches et d’empêcher un utilisateur de modifier une tâche qui ne lui appartient pas.

##  Conclusion
- Laravel MVC a permis une meilleure structuration et une séparation des responsabilités.
- Blade assure une meilleure organisation des vues.
- Policies sécurisent l’accès aux données.