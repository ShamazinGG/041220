<?php
require_once(dirname(__FILE__) . '/MigrationIncludes/DB.php');
require_once(dirname(__FILE__) . '/MigrationIncludes/Migration.php');
require_once(dirname(__FILE__) . '/MigrationIncludes/MigrationManager.php');

$db = DB::getDB();
$command = new MigrationManager($db);
$command->path = dirname(__FILE__) . '/migrations';

$action = isset($argv[1]) ? ucfirst($argv[1]) : 'help';
$params = array_slice($argv, 2);

if (method_exists($command,$action)) {
    if ($exitCode = call_user_func_array(array($command, $action), $params)) {
        exit($exitCode);
    }
} else {
    $command->help();
    exit(1);
}