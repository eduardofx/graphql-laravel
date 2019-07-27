# Laravel Grpahql PostgreSql

Docker

> $ docker-compose up -d --build


Link Simbolico
> $ ln -s public html
> $ ln -la



Docker PgSQL

> docker network create --driver bridge postgres-network


127.0.0.1:16543

------------------

Cria projeto Laravel

> composer create-project laravel/laravel laravel


Biblioteca Graphql
> composer require rebing/graphql-laravel



1. Laravel 5.5+ 

config/graphql.php


> Rebing\GraphQL\GraphQLServiceProvider::class,


Alias
> 'GraphQL' => 'Rebing\GraphQL\Support\Facades\GraphQL',

Por último rodar

> $ php artisan vendor:publish --provider="Rebing\GraphQL\GraphQLServiceProvider"


____

http://127.0.0.1:8000/graphiql

> php artisan make:graphql:query UserQuery
> php artisan make:graphql:query PostQuery

```javascript
query{
  user(id:1){
		name
    posts{
      title
    }
  }
}
```


> php artisan make:graphql:type UserType
> php artisan make:graphql:type PostType

Tipo de campo possíveis
Type.php


> php artisan migrate
> php artisan db:seed



> php artisan make:graphql:mutation PostMutation
> php artisan make:graphql:mutation UserMutation

---

```javascript
mutation{
  post_mutation(title:"teste", active:true, user_id:1){
    title    
  }
}
```

```javascript
mutation($title: String!, $active: Boolean!,  $user_id: Int!){
  post_mutation(title: $title, active: $active, user_id: $user_id){
    id,
    user_id,
    title
  }
}
```

```javascript
{
  "title":"teste 2",
  "active": false,
  "user_id": 4
}
```

http://127.0.0.1:8000/graphql?query=query{%20user(id:%203){%20name,%20id,%20email%20}%20}
