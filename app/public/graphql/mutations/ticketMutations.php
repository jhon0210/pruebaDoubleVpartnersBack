<?php

use App\Models\Ticket;
use GraphQL\Type\Definition\Type;

$ticketMutations = [
  'addTicket' => [
    'type' => $ticketType,
    'args' => [
      'username' => Type::nonNull(Type::string()),
      'status' => Type::nonNull(Type::string()),
    ],
    'resolve' => function($root, $args) {
      $ticket = new Ticket([
        'username' => $args['username'],
        'status' => $args['status'],
      ]);
      $ticket->save();
      return $ticket->toArray();
    }
  ],
  'updateTicket' => [
    'type' => $ticketType,
    'args' => [
      'id' => Type::nonNull(Type::int()),
      'username' => Type::string(),
      'status' => Type::string(),
    ],
    'resolve' => function($root, $args) {
      $ticket = Ticket::find($args['id']);
      $ticket->username = isset($args['username']) ? $args['username'] : $ticket->username;
      $ticket->status = isset($args['status']) ? $args['status'] : $ticket->status;
      $ticket->save();
      return $ticket->toArray();
    }
  ],
  'deleteTicket' => [
    'type' => $ticketType,
    'args' => [
      'id' => Type::nonNull(Type::int()),
      'username' => Type::string(),
      'status' => Type::string(),
    ],
    'resolve' => function($root, $args) {
      $ticket = Ticket::find($args['id']);
      $ticket->delete();
      return $ticket->toArray();
    }
  ],
];
