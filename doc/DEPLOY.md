# deploy

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
```
