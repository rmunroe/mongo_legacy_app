FROM php:8.1.0RC5-apache-bullseye

RUN apt-get update 
RUN apt-get -y install curl libcurl4-openssl-dev pkg-config git
RUN docker-php-ext-install curl

RUN pecl install mongodb && docker-php-ext-enable mongodb

EXPOSE 80

WORKDIR /var/www/html/

RUN git clone https://github.com/jscanzoni/mongo_legacy_app.git .