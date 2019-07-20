<?php

namespace App\GraphQL\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL;
use App\Post;

class PostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'PostMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('post_type');
    }

    public function args()
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Titulo do Post'
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'status do Post'
            ],
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID do usuário'
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $post = Post::create([
            'title' => $args['title'],
            'active' => $args['active'],
            'user_id' => $args['user_id'],
            'created_at' => today(),
            'updated_at' => today()
        ]);

        return  $post;
     
    }
}