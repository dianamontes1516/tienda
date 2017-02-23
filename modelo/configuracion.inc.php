<?php 
/********************************************************************
 ********************************************************************
 * Configuración de la aplicación del Sistema 
 ********************************************************************
 *********************************************************************/
/**
 * Variable para definir el ambiente
 * @var string - {DESARROLLO | PRODUCCIÓN}
 */
define('AMBIENTE', 'DESARROLLO');

if (AMBIENTE === 'DESARROLLO') {
	define('DB', 'pgsql');	
	define('DEBUG_SQL', true);	
	define('ASSOC', true);	
	define('ALL', false);	
        define('DB_HOST', 'localhost');
	define('DB_PORT', '5432');
        define('DB_NAME', 'online_store');
	define('DB_USER', 'santiago');
        define('DB_PASSWORD', 'hola123,');

} elseif (AMBIENTE === 'PRODUCCIÓN') {
	define('DB', 'pgsql');	
	define('DEBUG_SQL', false);	
	define('ASSOC', true);	
	define('ALL', false);	
        define('DB_HOST', 'localhost');
	define('DB_PORT', '5432');
        define('DB_NAME', 'tienda');
	define('DB_USER', 'tienda');
        define('DB_PASSWORD', 'hola123,');

} else {
	die();
}
