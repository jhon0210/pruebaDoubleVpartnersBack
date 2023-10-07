<?php

use App\Models\Ticket;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootQuery = new ObjectType([
  'name' => 'Query',
  'fields' => [
    'getTicket' => [
      'type' => $ticketType,
      'args' => [
        'id' => Type::nonNull(Type::int())
      ],
      'resolve' => function($root, $args) {
        $ticket = Ticket::find($args['id'])->toArray();
        return $ticket;
      }
    ],
    'getAllTickets' => [
      'type' => Type::listOf($ticketType),
      'args' => [
        'page' => Type::int(),
        'perPage' => Type::int(), // Number of items per page
      ],
      'resolve' => function($root, $args) {
        // Define the default page and perPage values if not provided
        $page = isset($args['page']) ? $args['page'] : 1;
        $perPage = isset($args['perPage']) ? $args['perPage'] : 10;

        // Calculate the offset (skip) based on the page and perPage values
        $skip = ($page - 1) * $perPage;

        // Query the tickets with pagination
        $tickets = Ticket::skip($skip)->take($perPage)->get()->toArray();
        return $tickets;
      }
    ],
  ]
]);
