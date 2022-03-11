# Stand Along Legacy App Container

## Build Docker File

Grab the [dockerfile](includes/dockerfile) and load it onto your docker host.

```sh
mkdir php-mongo-legacy-app
cd php-mongo-legacy-app
wget https://raw.githubusercontent.com/jscanzoni/mongo_legacy_app/master/includes/dockerfile
docker build -t php-mongo-legacy-app .
```

## Run Docker Container

```sh
docker run -d \
  --name=legacy_apps \
  -e CONNECTION_STRING=<mongodb connection string> \
  -p 80:80 \
  -p 443:443 \
  -v <local cert pem>:/etc/ssl/certs/ssl-cert-snakeoil.pem \
  -v <local cert key>:/etc/ssl/private/ssl-cert-snakeoil.key \
  --restart always \
php-mongo-legacy-app:latest 
```

## Create a New Application

New apps are created using an internal application for the Solutions Consulting team.
