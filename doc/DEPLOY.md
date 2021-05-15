# deploy

```bash
# Ubuntu 20.04
$ sudo snap install heroku --classic
$ heroku login
$ cd ~/code/star-wars-saga-tool/
$ git init
$ heroku git:remote -a star-wars-saga-tool
$ git subtree push --prefix symfony heroku main
$ heroku logs --tail
$ echo 'web: heroku-php-nginx -C nginx_app.conf public/' > Procfile
$ git add Procfile nginx_app.conf
$ git commit -m "Nginx Procfile and config"
```
