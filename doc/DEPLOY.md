# deploy

In [Heroku DashBoard Settings](https://dashboard.heroku.com/apps/star-wars-saga-tool/settings) set the following .env
variables:

```bash
APP_ENV=prod
APP_SECRET=mysecret
BASE_URL=/
HOST=star-wars-saga-tool.herokuapp.com
DATABASE_URL=${heroku config:get JAWSDB_URL -a star-wars-saga-tool}
PROJECT_PATH=symfony
SCHEME=https
```
Also setup the buildpack `https://github.com/timanovsky/subdir-heroku-buildpack` in settings since we setup the symfony
project in a subfolder of the git repo. 

```bash
# Ubuntu 20.04
$ sudo snap install heroku --classic
$ heroku login
$ cd ~/code/star-wars-saga-tool/
$ git init
$ echo 'web: heroku-php-nginx -C nginx_app.conf public/' > Procfile
$ git add Procfile nginx_app.conf
$ git commit -m "Nginx Procfile and config"
$ heroku git:remote -a star-wars-saga-tool
$ heroku buildpacks:clear
$ heroku buildpacks:set https://github.com/timanovsky/subdir-heroku-buildpack
$ heroku buildpacks:add heroku/php
$ heroku buildpacks:add heroku-php-nginx
$ heroku config:set PROJECT_PATH=symfony
$ heroku config:set APP_SECRET=$(php -r 'echo bin2hex(random_bytes(16));') -a star-wars-saga-tool
$ git push heroku main 
$ heroku logs -a star-wars-saga-tool --tail
$ heroku addons:create jawsdb:kitefin -a star-wars-saga-tool
# For setting DATABASE_URL in  ./symfony/.env
$ heroku config:get JAWSDB_URL -a star-wars-saga-tool
```

EACH DEPLOY

```bash
$ heroku run "php bin/console cache:clear" -a star-wars-saga-tool
$ heroku run "php bin/console doctrine:migrations:migrate" -a star-wars-saga-tool
$ heroku run "php bin/console doctrine:schema:drop" -a star-wars-saga-tool
$ heroku run "php bin/console doctrine:schema:drop --force" -a star-wars-saga-tool
$ heroku run "php bin/console doctrine:schema:create" -a star-wars-saga-tool
$ heroku run "composer dump-autoload --no-dev --classmap-authoritative" -a star-wars-saga-tool
```
