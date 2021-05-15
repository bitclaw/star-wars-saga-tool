#!/bin/bash

docker-compose exec php php /var/www/symfony/bin/console cache:clear
