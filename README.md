# Air Office

Ceci est un projet de réservation de salle de co-working.

## Pour démarrer

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
