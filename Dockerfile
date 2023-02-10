FROM php:8.1 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev libz-dev
RUN docker-php-ext-install bcmath

# MEMCACHED
RUN apt-get install -y libz-dev libmemcached-dev && \
apt-get install -y memcached libmemcached-tools && \
pecl install memcached && \
docker-php-ext-enable memcached

WORKDIR /var/www
COPY . .

COPY --from=composer:2.5.1 /usr/bin/composer /usr/bin/composer

ENV PORT=8000

#RUN ["chmod", "+x", "docker/entrypoint.sh"]

ENTRYPOINT [ "docker/entrypoint.sh" ]
