<?php
/**
 * Copia el contenido de este archivo entre la cabecera del paquete (package) y el mensaje de 'Feliz blogging'
 * Copy this file content between package header and 'happy blogging' message
 * 
 * Para más información sobre el archivo wp-config.php visita:
 * For more info about wp-config.php visit:
 * 
 * https://codex.wordpress.org/Editing_wp-config.php
 */

//Define el entorno de trabajo
//Define work environment
define( 'WORKING_IN', 'local' );

switch( WORKING_IN )
{
    case 'local':
        //Activar la notificación de errores de PHP
        //Enable PHP error notice
        error_reporting( -1 );
        ini_set( 'display_errors', 1 );
        //Define las credenciales de la base de datos
        //Define database credentials
        $db_name     = 'your_local_database';
        $db_user     = 'root';
        $db_password = '';
        $db_host     = 'localhost';
        //Define la URL de la web
        //Define website URL
        $wp_home = 'http://localhost/your-project-folder';
        $wp_site = 'http://localhost/your-project-folder';
        //Activa la depuración
        //Enable debug options
        define( 'WP_DEBUG', true );
        define( 'WP_DEBUG_DISPLAY', true );
        define( 'WP_DEBUG_LOG', true );
        define( 'SCRIPT_DEBUG', true );
        //Desactivar la caché de WP
        //Disable WP caché
        define( 'WP_CACHE', false );
        define( 'DISABLE_CACHE', true );
        //Define la concatenación y compresión de elementos
        //Define elements concat and compress
        define( 'CONCATENATE_SCRIPTS', false );
        define( 'COMPRESS_CSS', false );
        define( 'COMPRESS_SCRIPTS', false );
        define( 'ENFORCE_GZIP', false );
        break;
    case 'website':
        //Desactivar la notificación de errores de PHP
        //Disable PHP error notice
        error_reporting( 0 );
        ini_set( 'display_errors', 0 );
        //Define las credenciales de la base de datos
        //Define database credentials
        $db_name     = 'your_website_database';
        $db_user     = 'your_website_db_user';
        $db_password = 'your_website_db_password';
        $db_host     = 'your_website_server';
        //Define la URL de la web
        //Define website URL
        $wp_home = 'https://www.yourwebsite.com';
        $wp_site = 'https://www.yourwebsite.com';
        //Desactiva la depuración
        //Disabled debug options
        define( 'WP_DEBUG', false );
        define( 'WP_DEBUG_DISPLAY', false );
        define( 'WP_DEBUG_LOG', false );
        define( 'SCRIPT_DEBUG', false );
        //Forzar SSL en el Login
        //Force SSL Login
        define( 'FORCE_SSL_LOGIN', true );
        define( 'FORCE_SSL_ADMIN', true );
        //Evita la instalación de plugins y temas
        //Avoid plugins and themes install
        define( 'DISALLOW_FILE_MODS', true );
        //Activar la caché de WP
        //Enable WP caché
        define( 'WP_CACHE', true );
        define( 'ENABLE_CACHE', true );
        //Define la concatenación y compresión de elementos
        //Define elements concat and compress
        define( 'CONCATENATE_SCRIPTS', true );
        define( 'COMPRESS_CSS', true );
        define( 'COMPRESS_SCRIPTS', true );
        define( 'ENFORCE_GZIP', true );
        break;
}

//Define las credenciales de la base de datos
//Define database credentials
define( 'DB_NAME', $db_name );
define( 'DB_USER', $db_user );
define( 'DB_PASSWORD', $db_password );
define( 'DB_HOST', $db_host );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', 'utf8mb4_general_ci' );

//Cambiar las claves de acceso únicas. La URL para crearlas es: https://api.wordpress.org/secret-key/1.1/salt/
//Change de access keys. The URL to create it is: https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY', 'C(9GyZbC)z?|s;$4|l&%r)rKpTIky,Q05{==-_7!o Q)#N%&[,++uGQ*c-CNCHQr' );
define( 'SECURE_AUTH_KEY', '4~r~Cz$bTci@)>^ylxa/B0;jXo4Jr]3+C{~n+bUTw<.^Y_}@pV[S_u<B[4E+TQ3U' );
define( 'LOGGED_IN_KEY', 'C{VqL`&_Y1G,$b~K*sI4c3!6s4(/?!&Y-4tIy{NZ=]R&B![Z9_oB](Qe^-^oX9|C' );
define( 'NONCE_KEY', 'uP]6bY#C;gA25RS UzY8FP~Va^ygBtuzZ]I;!d7-j7|$Khu+T?9KfL%f*mNo|QT*' );
define( 'AUTH_SALT', '|P,idMLr|C0Ih2pmjl0cq 7vN%8sB7j0zCg2c~1K)iAW&#|C2azlF>{A?66fu-cT' );
define( 'SECURE_AUTH_SALT', 'vivvDy.vRl+a5z$lGM3#^<silI{Dy>$ob#mCg^P-g^bOpo4&a.g7%HW-ocg)i,^w' );
define( 'LOGGED_IN_SALT', 'Q6|EV>@fv= 7zz!Zg3/{tkd@Xh-HR4NHD(Gt$<?V#Ha-^`c3;{3R<#+Po]![9Lzk' );
define( 'NONCE_SALT', '|8KR.-np2O::-h*HTDZfI;IYlwqN:V|w#c`O?{}6msSP3e8Be@3fL.$0}^:T5Kcl' );

//Define el prefijo de la base de datos
//Define database prefix
$table_prefix  = 'wp_';

//Desactivar actualizaciones automáticas para el núcleo, los temas y los plugins.
//Disable updates for core, themes and plugins.
define( 'AUTOMATIC_UPDATER_DISABLED', true );

//Desactivar el editor de código.
//Disable code edit.
define( 'DISALLOW_FILE_EDIT', true );

//Desactivar las revisiones de las entradas y las páginas.
//Disable reviews of posts and pages.
//DELETE FROM wp_posts WHERE post_type = 'revision';
define( 'WP_POST_REVISIONS', false );

//Borrar la papelera después de 7 días
//Delete trash after 7 days
define( 'EMPTY_TRASH_DAYS', 7 );

//Define la URL de la web
//Define website URL
define( 'WP_HOME', $wp_home );
define( 'WP_SITEURL', $wp_site );

//Desactiva el cron de WP
//Disabled WP cron
define( 'DISABLE_WP_CRON', true );

//Define el límite de memoria.
//Define memory limit.
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

//Borrar versiones de imágenes al eliminar la original
//Delete images versions when remove the original
define( 'IMAGE_EDIT_OVERWRITE', true );

//Permite que la web sea multisitio (borrar estas líneas si no es un multisitio).
//Allow that the web is multisite (remove this lines if website isn't multisite).
define( 'WP_ALLOW_MULTISITE', true );

//Desactiva la etiqueta <p> en Contact Form 7 (borrar estas líneas si el plugin no está instalado)
//Disable <p> tag in CF7 (remove this lines if plugin isn't installed)
define( 'WPCF7_AUTOP', false );

//Repara los conflictos de la base de datos (activar solo para la reparación).
//Repair database errors (enable only for repair).
//yourdomain.com/wp-admin/maint/repair.php
define( 'WP_ALLOW_REPAIR', false );