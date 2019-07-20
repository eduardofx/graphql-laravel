<?php

namespace App\GraphQL\Type;

use App\User;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use GraphQL\Type\Definition\Type;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'Tipo de Usuario',
        'model' => User::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID do usuario no banco de dados'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'O nome do usuario no banco de dados'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'O email do usuario no banco de dados'
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('post_type')),
                'description' => 'Os posts por usuário' 
            ]
        ];
    }
}