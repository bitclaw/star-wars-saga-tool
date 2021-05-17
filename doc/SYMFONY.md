# Symfony useful commands

## Initial Setup

```bash
$ composer install
$ php bin/console doctrine:migrations:migrate
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

## Testing

```bash
$ php ./vendor/bin/phpunit
# create the test database (star_wars_saga_tool_test)
$ php bin/console --env=test doctrine:database:create
# create the tables/columns in the test database
$ php bin/console --env=test doctrine:schema:create
$ php bin/console make:fixtures
$ php bin/console doctrine:fixtures:load
$ php bin/console make:test
# Load the fixtures for the test environment/database
$ APP_ENV=test symfony console doctrine:fixtures:load
$ APP_ENV=test php bin/console --env=test doctrine:schema:update --force
```
