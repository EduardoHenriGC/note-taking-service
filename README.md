## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/EduardoHenriGC/note-taking-service.git
```
```sh
cd note-taking-service/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="Especializa Ti"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=username
DB_PASSWORD=userpass

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```
Rodar as migration
```sh
php artisan migrate
```
Instalar as dependencias do NPM fora do container do docker!! na pasta do raiz do projeto
```sh
npm install
```

Acesse o projeto
```sh
npm run dev
```

