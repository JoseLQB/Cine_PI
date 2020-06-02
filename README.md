   # Bienvenidos a Cine PI :collision:

Cine PI es una aplicación web que se divide en dos partes; una permite la realización de reservas online de un cine a un usuario normal, y otra para un administrador que se encarga de administrar todos los contenidos de la web.
La aplicación ha sido desarrollada como proyecto integrado de Desarrollo de Aplicaciones Web (DAW) para el IES Polígono Sur (Sevilla). 
<p align="center"><img src="https://lh4.googleusercontent.com/bE-zmkMDs_GGk2RN8r5MDW4cJ2vJplj5lFl-l7eLuuCkhMEDX544dgN5AjW6AGFKRyfgMsuNx26o3ka_f9QNiwAb8NLuLxdplFEzrJrNCbdGW5xPsvVvRcW7fzgZOXcJiKpiQS5M" aling="center"></p>


## Desarrollo  :art:
Para el desarrollo de la aplicación se han utilizado las tecnologías mysql y php para la parte de servidor, y jquery, bootstrap, html y css para la parte de cliente.

## Ejecución :rocket:
Para visualizar la web en local, es necesario tener instalado un servidor local, php y mysql. Para el desarrollo de esta se ha utilizado el paquete xampp, es recomendable, por su sencillez a la hora de intalarlo y configurarlo, utilizar uno similar (xampp, lampp, wampp...).

Dependiendo del paquete usado los directorios pueden cambiar. En el caso de xampp, hay que hacer git clone dentro del directorio xampp/htdocs.
Si estás usando linux con un servidor apache hacer git commit en /var/www/html/

## Acceso :computer:
La aplicación permite desde el primer momento registrarse como usuario y acceder como tal, pero este no tendrá permisos de administración. Para ello, acceder con los siguientes datos:
Usuario: Admin
Contraseña: admin

## API OMDB :movie_camera:

Se ha implementado un sistema de búsqueda desarrollado con la api de cine OMDB. 
Web oficial: [http://www.omdbapi.com/](http://www.omdbapi.com/)


