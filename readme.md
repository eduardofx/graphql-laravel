
> composer create-project laravel/laravel laravel

> composer require rebing/graphql-laravel



1. Laravel 5.5+ will autodiscover the package, for older versions add the following service provider

Rebing\GraphQL\GraphQLServiceProvider::class,
and alias

'GraphQL' => 'Rebing\GraphQL\Support\Facades\GraphQL',
in your config/app.php file.

2. Publish the configuration file

$ php artisan vendor:publish --provider="Rebing\GraphQL\GraphQLServiceProvider"
3. Review the configuration file

config/graphql.php


http://127.0.0.1:8000/graphiql

php artisan make:graphql:query UserQuery
php artisan make:graphql:query PostQuery


query{
  user(id: 1)
}


php artisan make:graphql:type UserType
php artisan make:graphql:type PostType

Tipo de campo possíveis
Type.php


php artisan migrate
php artisan db:seed



php artisan make:graphql:mutation PostMutation
php artisan make:graphql:mutation UserMutation

mutation{
  post_mutation(title:"teste", active:true, user_id:1){
    title    
  }
}



mutation($title: String!, $active: Boolean!,  $user_id: Int!){
  post_mutation(title: $title, active: $active, user_id: $user_id){
    id,
    user_id,
    title
  }
}


{
  "title":"teste 2",
  "active": false,
  "user_id": 4
}

http://127.0.0.1:8000/graphql?query=query{%20user(id:%203){%20name,%20id,%20email%20}%20}