# Troubleshooting

* When visiting `http://symfony.localhost/` the following runtime exception happens:

```bash
RuntimeException
Unable to write in the "cache" directory (/var/www/symfony/var/cache/dev).
```
Solution: Run `docker-compose exec php php /var/www/symfony/bin/console cache:clear`


# Useful link

* [Automated heroku deploy from subfolder](https://stackoverflow.com/questions/39197334/automated-heroku-deploy-from-subfolder)
