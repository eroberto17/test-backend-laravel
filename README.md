# Documento


## Installacion

Seeder para alta de BD

```bash
php artisan migrate:fresh --seed
```

Seeder para baja de 3 suscripciones

```bash
php artisan db:seed --class=UserUnsuscribeSeeder
```

## Comando Artisan

Ej: php artisan reports:sales 2020-11-2 SVS2

```bash
php artisan reports:sales YYYY-MM-DD Servicio
```

## API
http://127.0.0.1:8000/api/usuarios

http://127.0.0.1:8000/api/cobros

http://127.0.0.1:8000/api/usuarios/desinscribir/{id}

http://127.0.0.1:8000/api/cobros/notificacion/{id}
