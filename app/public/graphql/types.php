<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$ticketType = new ObjectType([
  'name' => 'Ticket',
  'description' => 'Ticket type',
  'fields' => [
    'id' => Type::int(),
    'username' => Type::string(),
    'status' => Type::string(),
    'created_at' => Type::string(),
    'updated_at' => Type::string(),
  ],
]);

