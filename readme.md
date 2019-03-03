Aplicacion de Oclem creada con Symfony

Doc Symfony

config - Contains... configuration of course!. 
You will configure routes, services and packages. 

src - All your PHP code lives here. 
templates - All your Twig templates live here. 
bin - The famous bin/console file lives here (and other, less important executable files). 
var - This is where automatically-created files are stored, like cache files (var/cache/) and logs (var/log/). 
vendor - Third-party (i.e. "vendor") libraries live here! These are downloaded via the Composer package manager. 
public - This is the document root for your project: you put any publicly accessible files here.

Extensión annotations instalada de serie 
Rutas en controlador Extensión symfony/asset instalada de serie
Funcion de Twig asset()

## NPM

Instalar encore, jquery y otras librerias de JS con npm: `npm install --save [libreria]`

Se instalan en /node_modules

## ORM - Doctrine

orm-pack instalado de serie
maker-bundle instalado de serie

Problemas:
No puede encontrar el driver: Instalar el modulo mysql en la version actual de php - `sudo apt-get install php[version~7.1]-mysql`

Confirmacion: `php -i | grep mysql`