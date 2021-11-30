# Air Office

Ceci est un projet de réservation de salle de co-working.

## Pour démarrer le projet

Pour travailler sur le projet, on clone le dépôt Github :

```bash
git clone https://github.com/matthieumota/air-office.git
```

Ensuite, on doit installer les dépendances PHP (Il faut avoir PHP 7.4) :

```bash
cd air-office
composer install
```

Si on clone le projet pour la première fois, on doit initialiser les variables d'environnements :

```bash
cp .env.example .env
php artisan key:generate
```

Pour lancer le projet :

```bash
php artisan serve
```

## Pour contribuer sur le projet :

Toute contribution sur le projet doit se faire via une **User Story** à définir dans le [trello]
(https://trello.com/b/nbadFlgF/air-office).

La colonne **To Do** représente le sprint actuel. C'est dans cette colonne qu'on va se servir au niveau des tâches à réalisées.
