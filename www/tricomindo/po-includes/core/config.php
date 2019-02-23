<?php

$site['structure'] = 'PopojiCMS';
$site['ver'] = '2.0';
$site['build'] = '1';
$site['release'] = '07 Juli 2016';

define('CONF_STRUCTURE', $site['structure']);
define('CONF_VER', $site['ver']);
define('CONF_BUILD', $site['build']);
define('CONF_RELEASE', $site['release']);

$site['url'] = "http://localhost:8001/tricomindo/";
$site['adm'] = "po-admin";
$site['con'] = "po-content";
$site['inc'] = "po-includes";

define('WEB_URL', $site['url']);
define('DIR_ADM', $site['adm']);
define('DIR_CON', $site['con']);
define('DIR_INC', $site['inc']);

//Get Heroku ClearDB connection information
$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

$db['host'] = '172.28.0.2';
$db['driver'] = "mysql";
$db['sock'] = "";
$db['port'] = "3306";
$db['user'] = 'root';
$db['passwd'] = 'test';
$db['db'] = 'tricomindo';

define('DATABASE_HOST', $db['host']);
define('DATABASE_DRIVER', $db['driver']);
define('DATABASE_SOCK', $db['sock']);
define('DATABASE_PORT', $db['port']);
define('DATABASE_USER', $db['user']);
define('DATABASE_PASS', $db['passwd']);
define('DATABASE_NAME', $db['db']);

$site['vqmod'] = FALSE;
$site['timezone'] = "Asia/Jakarta";
$site['permalink'] = "slug/post-title";
$site['slug_permalink'] = "detailpost";

define('VQMOD', $site['vqmod']);
define('TIMEZONE', $site['timezone']);
define('PERMALINK', $site['permalink']);
define('SLUG_PERMALINK', $site['slug_permalink']);

?>