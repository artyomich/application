<?php
return array(
  'doctrine' => array(
    'connection' => array(
      'orm_default' => array(
        'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
        'params' => array(
          'host'     => 'localhost',
          'port'     => '3306',
          'user'     => 'root',
          'password' => 'q',
          'dbname'   => 'test_application',
        )
      )
    ),
  ),
  'configuration' => array(
    'orm_default' => array(
      'numeric_functions' => array(
        'RAND' => 'Application\Doctrine2\Rand'
      )
    )
  ),
);