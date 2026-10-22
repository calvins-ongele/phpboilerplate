<?php 

// define a default path constant
define('PATH', getenv('DOCUMENT_ROOT') . '/libs/');
define('ROOT', getenv('DOCUMENT_ROOT') . '/'); 
 $rui = explode('/',$_SERVER['REQUEST_URI'] )[1] ?? 'dashboard';
 $rui = explode('?',$rui)[0];      
        
//define('DASHBOARD', getenv('DOCUMENT_ROOT') . '/views/dashboard/');
define('ADMIN', getenv('DOCUMENT_ROOT') . "/views/{$rui}/");
define('PROFILE_NAV', "{$rui}" );

define('SERVER', $_ENV['SERVER']);
define('USERNAME', $_ENV['USERNAME']);
define('PASSWORD', $_ENV['PASSWORD']);
define('DBNAME', $_ENV['DBNAME']);
define('CODE_VERSION', $_ENV['CODE_VERSION']); 
define('SYSTEM', $_ENV['SYSTEM']);
define('UPLOADS', $_ENV['UPLOADS']);
define("RESEND_API_KEY", $_ENV['RESEND_API_KEY']); 
define('CLASS_NAME', $rui);

