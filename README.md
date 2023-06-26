# Air Office

Ceci est un projet de réservation de salle de co-working avec Laravel.

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

Pour créer la BDD :

```bash
php artisan migrate
```

Pour remplir la BDD :

```bash
php artisan db:seed
```

Pour lancer le projet :

```bash
php artisan serve
```

Pour travailler sur le front :

```bash
npm run watch
```

## Pour contribuer sur le projet :

Toute contribution sur le projet doit se faire via une **User Story** à définir dans le [trello]
(https://trello.com/b/nbadFlgF/air-office).

La colonne **To Do** représente le sprint actuel. C'est dans cette colonne qu'on va se servir au niveau des tâches à réalisées.

## Pour déployer le projet :

On peut déployer la branche develop sur le serveur de pré-production :

```bash
./vendor/bin/dep deploy stage=staging
```

Pour déployer sur la production :

```bash
./vendor/bin/dep deploy stage=prod
```
