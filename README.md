# Stand Along Legacy App Container

## Build Docker File

```
cd includes
docker build -t php-mongo-legacy-app .
```

## Run Docker Container

```
docker run -d \
  --name=legacy_app-<app name> \
  -e APP=<app name> \
  -e CREDS="<username:password>" \
  -e URL="<mongodb url>" \
  -p 80:80 \
  --restart always \
php-mongo-legacy-app:latest 
```

## Create a New Application

New apps are created using an internal application for the Solutions Consulting team.
