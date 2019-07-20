<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use GraphQL;
use App\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'Query de Usuarios'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('user_type'));
    }

    public function args()
    {
        return [
            'id' => [
                //Obrigatorio
                //'type' => Type::nonNull(Type::int()),
                'type' => Type::int(),
                'description' => 'ID int'
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();
        
        if(isset($args['id'])){
            return User::where('id', $args['id'])->get();
        }

        return User::all();
    }
}