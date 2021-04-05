#backendtest

# Challenge técnico Backend

Se informan medio de solución a las 7 evaluaciones incorporadas en el challenge
Se genero un modelo de APi mediante Lumen/laravel que posee los metodos para desarrollar cada ejercicios salvo el 7, el cual es una query y estrá informada al final del documento.

A su vez indico la siguiente coleccion en postman para facilitar el uso de la API https://www.getpostman.com/collections/182ea2359712c64a3a17

## Instalación
Se puede instalar con docker o directamente desde php
### Docker compose
Debe estar instalado docker, si no lo está seguir instrucciones desde  https://docs.docker.com/install/
Conexión a la base de datos se debe realizar en el archivo .env ubicado en la raiz del proyecto.
Ejecutar los siguientes comandos en la raiz del proyecto
```
docker-compose build
docker-compose up
```

## Ejercicios
### Ejercicio 1: Docker
Esto se resuelve al generar la instalación de este repositorio. se generan 2 contenedores uno para php y otro para mysql

### Ejercicio 2: API REST + CRUD
Para esto puedes consumir la colección de postman adjunta posterior al levantamiento del servicio. Solo tolera envio de datos por post en los metodos
GET     http://localhost:8000/empresa sin parametro trae todas las empresas y con id la empresa especifica Content-Type:application/json

POST    http://localhost:8000/empresa debe recibir parametro json de empresa con header Content-Type:application/json de Json:
{
    "nombre":"nuevaprueba",
    "email_contacto":"nuevaprueba@nuevaprueba.cl"
}

PUT     http://localhost:8000/empresa/{id_empresa} debe recibir argumento de id de empresa, y parametro json de empresa con header Content-Type:application/json de Json:
{
    "nombre":"nombreacambiar",
    "email_contacto":"correocambio@correocambio.cl"
}

DELETE  http://localhost:8000/empresa/{id_empresa} debe recibir argumento de id de empresa a eliminar, con header Content-Type:application/json 

### Ejercicio 3: Análisis + Desarrollo
función que permite obtener las cadena que son palindromos dentro del texto dado
puede ejecutarse desde la coleccion de postman (como get), con el archivo script alojado en /scripts o por el browser en:

http://localhost:8000/preguntatres

### Ejercicio 4: Consumo API Envíame para la creación de un envío 

funcion que permite ingresar envios, estos son visibles en la base de datos del proyecto a la hora de ingresarse
debe ejecutarse desde postman como POST a:
http://localhost:8000/preguntacuatro
agregando:
Content-Type:application/json
en el body como raw un json de carga de envio como el adjuntado en la documentacion

### Ejercicio 5: Análisis + Desarrollo

Funcion que permite obtener el numero fibonacci con 1000 divisores. Recomiendo correr esto directamente desde el script Fibonacci.php en la carpeta scripts en la raiz del proyecto aunque tambien esta cargado en la api en el endpoint:
http://localhost:8000/preguntacinco

### Ejercicio 6: Análisis + Desarrollo Aplicado a Negocio

Funcion que permite obtener el rango acorde al valor indicado como argumento del metodo
http://localhost:8000/preguntaseis
tiene tope de 2000 acorde a enunciado de la pregunta.


### Ejercicio 7: SQL

Posterior al cargar la data en el cliente de mysql de su eleccion, con la información provista en el ejercicio; favor ejecutar la siguiente sentencia de:

update employees e
join countries cn on cn.id = e.country_id
join continents ct on cn.continent_id = ct.id
set salary = (e.salary + (e.salary * (ct.anual_adjustment/100))) where e.salary <= 5000;


