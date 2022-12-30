###################
   INSTALACION 
###################
Descargar o hacer git clone del repositorio.
El nombre con el cual se ha creado la base_url seria prueba por lo tanto el nombre de la carpeta tiene que ser "prueba", de esa mamera se ha configurado el config $config['base_url'] = 'http://localhost:8080/prueba/';
Tomar en cuanta que esta en el puerto 8080, si su xampp no esta en ese puerto, cambiarlo en el archivo config, el cual se encuentra en application/config/config.php.

ejecutar el script de la base de datos el cual se encuentra en la carpeta BD, la conexion de la base de datos esa configurada sin password, con el usuario root, si su phpmyadmin posee password tendra que cambiarlo en el archivo de database, el cual se encuentra en application/config/database.php

Para ingresar al sistema como administrador las credenciales serian email: admin@gmail.com, y la password: 12345

De antemano, muchas gracias por estar particpando en el proceso de seleccion, espero ser seleccionado y poder adquirir nuevos conocimientos, y aportar soluciones a probelmas que se presenten.


*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.
w
************
Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
