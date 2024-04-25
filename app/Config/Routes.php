<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// ******* End Point de Tipos de Contacto
$routes->get('tipocontacto', 'C_TipoContacto::index');

$routes->get('tipocontacto/(:num)', 'C_TipoContacto::show/$1'); 

$routes->post('tipocontacto', 'C_TipoContacto::create');

// ******* End Point de Usuarios
$routes->get('usuario', 'C_Usuario::index');

$routes->get('usuario/(:num)', 'C_Usuario::show/$1'); 