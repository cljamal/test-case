# Install

## **On local webserver(Openserver, Xamp, Lamp, etc...)**

Install dependencies
```
composer install
```

Composer dump autoload
```
composer du
```

Create env file
```
cp .env.example .env
```

Add DB env in .env

```
DB_CONNECTION="sqlite"
```

Or use what ever you want (mysql, pgsql, etc...) just run migration

```
php artisan migrate
```

------

## **Or you can run it standalone with built in Docker**


Install dependencies
```
docker exec -it WebServer composer install
```

Composer dump autoload
```
docker exec -it WebServer composer du
```

Create env file
```
docker exec -it WebServer cp .env.example .env
```

Add DB env in .env

```
DB_CONNECTION="sqlite"
```
Or use what ever you want (mysql, pgsql, etc...) just run migration

```
docker exec -it WebServer php artisan migrate
```

Now you can open it in http://localhost:8081
