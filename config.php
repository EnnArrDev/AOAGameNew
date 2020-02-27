<?PHP

//Database Config
$db_host = 'localhost';
$db_table = 'aoa';
$db_user = 'root';
$db_pass = '';
$db_charset = 'utf8mb4';
$db_options = array();
$db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false,];
$db_dsn = "mysql:host=$db_host;dbname=$db_table;charset=$db_charset";

//Added to password string for extra security
$pepper = 'Jaryth Copyright 2020';

//Override debug for local testing
$debug_enabled = true;

date_default_timezone_set('America/Winnipeg');

?>