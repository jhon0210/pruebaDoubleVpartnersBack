<?php

use GraphQL\Type\Definition\ObjectType;

require('mutations/ticketMutations.php');

$mutations = array();
$mutations += $ticketMutations;

$rootMutation = new ObjectType([
  'name' => 'Mutation',
  'fields' => $mutations,
]);
