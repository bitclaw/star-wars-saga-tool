docker-symfony
==============

This is a complete stack for running Symfony 5 (latest version), PHP8 and ELK stack using docker-compose tool.

# Installation

First, clone this repository:

```bash
$ git clone https://github.com/eko/docker-symfony.git
```

Next, put your Symfony application into `symfony` folder and do not forget to add `symfony.localhost` in your `/etc/hosts` file.

```bash
# /etc/hosts
127.0.0.1 star-wars-saga-tool.test
```

Make sure you adjust `database_host` in `parameters.yml` to the database container alias "db" (for Symfony < 4)
Make sure you adjust `DATABASE_URL` in `env` to the database container alias "db" (for Symfony >= 4)

Then, run:

```bash
$ docker-compose up
```

You are done, you can visit your Symfony application on the following URL: `http://symfony.localhost` (and access Kibana on `http://star-wars-saga-tool.test:81`)

_Note :_ you can rebuild all Docker images by running:

```bash
$ docker-compose build
```

# How it works?

Here are the `docker-compose` built images:

* `db`: This is the MySQL database container (can be changed to postgresql or whatever in `docker-compose.yml` file),
* `php`: This is the PHP-FPM container including the application volume mounted on,
* `nginx`: This is the Nginx webserver container in which php volumes are mounted too,
* `elasticsearch`: This is the Elasticsearch server used to store our web server and application logs,
* `logstash`: This is the Logstash tool from Elastic Stack that allows to read logs and send them into our Elasticsearch server,
* `kibana`: This is the Kibana UI that is used to render logs and create beautiful dashboards. 

This results in the following running containers:

```bash
> $ docker-compose ps
             Name                           Command               State                 Ports
-----------------------------------------------------------------------------------------------------------
mysql                            docker-entrypoint.sh --def ...   Up      0.0.0.0:3306->3306/tcp, 33060/tcp
elasticsearch                    /usr/local/bin/docker-entr ...   Up      0.0.0.0:9200->9200/tcp, 9300/tcp
kibana                           /usr/local/bin/dumb-init - ...   Up      0.0.0.0:81->5601/tcp
logstash                         /usr/local/bin/docker-entr ...   Up      5044/tcp, 9600/tcp
nginx                            nginx                            Up      443/tcp, 0.0.0.0:80->80/tcp
php-fpm                          php-fpm7 -F                      Up      0.0.0.0:9000->9001/tcp
```

# Environment Customizations

You can customize the exposed ports and other parameters changing the docker-compose .env file.

# Read logs

You can access Nginx and Symfony application logs in the following directories on your host machine:

* `logs/nginx`
* `logs/symfony`

# Use Kibana!

You can also use Kibana to visualize Nginx & Symfony logs by visiting `http://symfony.localhost:81`.

# Use xdebug!

Start by updating your `docker-compose.yaml` file with `ENABLE_PHP_XDEBUG: 1` under the `php` service.
You will need to re-build the php container for this value to take effect.

Configure your IDE to use port 5902 for XDebug.
Docker versions below 18.03.1 don't support the Docker variable `host.docker.internal`.  
In that case you'd have to swap out `host.docker.internal` with your machine IP address in php-fpm/xdebug.ini.

# Code license

You are free to use the code in this repository under the terms of the 0-clause BSD license. LICENSE contains a copy of this license.
