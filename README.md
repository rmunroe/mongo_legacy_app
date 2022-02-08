# Stand Along Legacy App Container

## Build Docker File

```
cd includes
docker build -t php-mongo-legacy-app .
```

## Run Docker Container

```
docker run -d \
  --name=legacy_apps \
  -e CONNECTION_STRING=<mongodb connection string> \
  -p 80:80 \
  --restart always \
php-mongo-legacy-app:latest 
```

## Create a New Application

New apps are created using an internal Appian application for the Solutions Consulting team.