# Symfony useful commands

## Doctrine

```bash
$ php bin/console doctrine:database:create
$ php bin/console make:migration
$ php bin/console doctrine:migrations:migrate
$ php bin/console doctrine:query:sql 'SELECT * FROM user'
$ php bin/console doctrine:fixtures:load
```

## Classes

```bash
$ symfony console make:entity
$ php bin/console make:entity --regenerate
 php bin/console make:controller ProductController
```

## Cache

```bash
$ php bin/console cache:clear
```
