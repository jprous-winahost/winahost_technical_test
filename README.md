### PRUEBA TÉCNICA BACK 

En esta prueba técnica hemos estado haciendo pair programming con la creación del contexto de Owner yo ya he terminado mi parte, ahora te toca a ti:

Queda implementar la capa de Application con CQRS donde el CommandHandler tendrá que implementar el CommandHandlerInterface para ser llamado.

El proyecto está Dockerizado, y se ejecuta a partír del Command ```CreateOwnerCommand```

Dado que estamos trabajando con eventos de dominio, sería valorable hacer una llamada para crear un registro en los logs con datos relacionados del Owner.
Todo esto está valorado en el dominio del Owner ya que está extendiendo el ```AggregateRoot``` nos provee de esta funcionalidad.

Para cualquier tipo de duda, no dudes en levantar la mano y consultar.

Una vez se clona el proyecto 

Se debe instalar las dependencias con el comando

`composer install`

Luego se ejecutan las migraciones para crear las tablas necesarias con el comando

`php bin/console doctrine:migrations:migrate`

El comando para crear un Owner es

`php bin/console app:create-owner`

