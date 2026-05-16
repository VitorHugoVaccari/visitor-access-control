<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('index', 'Home::index');
$routes->post('index', 'Home::index');

$routes->get('esqueciSenha', 'Home::esqueciSenha');
$routes->post('esqueciSenha', 'Home::esqueciSenha');

$routes->post('atualizarUsuario', 'Home::atualizarUsuario');

$routes->post('home/autenticar', 'Home::autenticar');

$routes->get('erro', 'Home::erro');

$routes->get('dashboard', 'Home::dashboard');
$routes->post('dashboard', 'Home::dashboard');

$routes->get('registrar', 'Home::registrar');
$routes->post('registrar', 'Home::registrar');

$routes->get('home/registrarEntrada', 'Home::registrarEntrada');
$routes->post('home/registrarEntrada', 'Home::registrarEntrada');

$routes->post('registrarSaida', 'Home::registrarSaida');


$routes->get('visitantes', 'Home::visitantes');
$routes->post('visitantes', 'Home::visitantes');

$routes->get('editarVisitante/(:num)', 'Home::editarVisitante/$1');

$routes->post('atualizarVisitante', 'Home::atualizarVisitante');

$routes->get('historico', 'Home::historico');
$routes->post('historico', 'Home::historico');

$routes->get('confirmarSaida', 'Home::confirmarSaida');
