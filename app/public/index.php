<?php
// error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_reporting(~E_ALL);

require('../vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
  'driver' => 'mysql',
  'host' => 'db',
  'database' => 'tickets-php',
  'username' => 'root',
  'password' => 'secret',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

require('graphql/boot.php');
