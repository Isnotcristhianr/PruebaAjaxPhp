<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/inicio', 'Home::index');

//inicio
$routes->get('/', 'Prueba::index');

//obtener materia y notas
$routes->get('/obtenerMateriaNotas/(:num)', 'Prueba::getMateriaNotas/$1');

//notasEstudiantes
$routes->get('/notasEstudiantes', 'Prueba::notasEstudiantes');