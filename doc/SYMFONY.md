# Symfony useful commands

## Initial Setup

```bash
$ composer install
$ php bin/console doctrine:migrations:migrate
$ php bin/console doctrine:fixtures:load
$ chmod -R 777 symfony/var
```

## Route debugging

```bash
$ php bin/console debug:router
```

## Doctrine

```bash
$ php bin/console doctrine:database:create
$ php bin/console doctrine:migrations:status
# Generate migration automatically
$ php bin/console doctrine:migrations:diff
$ php bin/console make:migration
$ php bin/console make:migration
# Run all migrations
$ php bin/console doctrine:migrations:migrate
$ php bin/console doctrine:query:sql 'SELECT * FROM user'
$ php bin/console doctrine:fixtures:load
$ php bin/console doctrine:migrations:execute --up 'DoctrineMigrations\Version20210515194338'
$ php bin/console doctrine:migrations:execute --down 'DoctrineMigrations\Version20210515194338'
```

## Classes

```bash
$ symfony console make:entity
$ php bin/console make:entity --regenerate
// generates getter/setter methods for one specific Entity
$ php bin/console make:entity --regenerate App\\Entity\\Film
$ php bin/console make:controller ProductController
```

## Cache

```bash
$ php bin/console cache:clear
```
