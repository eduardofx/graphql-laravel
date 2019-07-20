<?php

namespace App\GraphQL\Type;

use App\Post;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use GraphQL\Type\Definition\Type;


class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A type',
        'model' => Post::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::ID(),
                'description' => 'ID do usuario do Post'
            ],
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID do usuario do Post'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Título do Post'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Status do Post'
            ]
        ];
    }
}