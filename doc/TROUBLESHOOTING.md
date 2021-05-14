# troubleshooting

* When visiting `http://symfony.localhost/` the following runtime exception happens:

```bash
RuntimeException
Unable to write in the "cache" directory (/var/www/symfony/var/cache/dev).
```
Solution: Run `docker-compose exec php php /var/www/symfony/bin/console cache:clear`
