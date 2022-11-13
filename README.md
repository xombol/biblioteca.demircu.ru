
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://biblioteca.demircu.ru/admin-assets/images/logo/logo.png" width="400" alt="Laravel Logo"></a></p>



## Project objective
Write a library website that will receive books from connected publications via the Api <br>
There is also a public RESTful API (hereinafter API) for publishing sites, which will allow you to add, modify and delete books from the Library list.

## Api documentation

```php
  GET|HEAD        api/books ......................................... books.index › API\BookController@index
  POST            api/books ......................................... books.store › API\BookController@store
  GET|HEAD        api/books/{book} .................................... books.show › API\BookController@show
  PUT|PATCH       api/books/{book} ................................ books.update › API\BookController@update
  DELETE          api/books/{book} .............................. books.destroy › API\BookController@destroy
  GET|HEAD        api/publishers/list ......................... publishers.list › API\BookController@destroy
```

> Before starting all actions, you will need to clarify your API token With the administrator <br>
> Example: 12|pIpin8EZeSSqo42wewertetrewwwetwrLrp

## ADD BOOK
<details><summary>SHOW</summary>
<p>

> URL: site.ru/api/books <br>
> METHOD : POST

#### Пример JSON
```json
{
    "name":"To Kill a Mockingbird (Paperback)",
    "description" : "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. ...",
    "isbn" : "978-1-56619-909-4",
    "authors" : [
        {
            "name" : "Harper Lee"
        }
    ]
}
```

</p>
</details>


## UPDATE BOOK
<details><summary>SHOW</summary>
<p>

> URL: site.ru/api/books/{book} <br>
> METHOD : PUT|PATCH

#### Пример JSON
```json
{
    "name":"To Kill a Mockingbird (Paperback)",
    "description" : "The unforgettable nov...",
    "isbn" : "978-1-56619-909-4",
    "authors" : [
        {
            "name" : "Harper Lee"
        },
        {
            "name" : "Tomi Lee"
        }
    ]
}
```

</p>
</details>

## SHOW BOOK
<details><summary>SHOW</summary>
<p>

> URL: site.ru/api/books/{book} <br>
> METHOD : GET

#### Пример вывода
```json
{
    "data": {
        "name": "Book1343455",
        "description": "many intresting",
        "isbn": "33453345",
        "authors": [
            {
                "id": 1,
                "name": "Jon2 Smit2",
                "created_at": "2022-11-13T16:41:08.000000Z",
                "updated_at": "2022-11-13T16:41:08.000000Z"
            }
        ]
    }
}
```

</p>
</details>

## DELETE BOOK
<details><summary>SHOW</summary>
<p>

> URL: site.ru/api/books/{book} <br>
> METHOD : DELETE

</p>
</details>


## GET LIST BOOKS
<details><summary>SHOW</summary>
<p>

> URL: site.ru/api/publishers/list <br>
> METHOD : GET

#### Пример вывода
```json
[
    {
        "id": 10,
        "publisher_id": 13,
        "name": "To Kill a Mockingbird (Paperback)",
        "description": "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. ...",
        "isbn": "978-1-56619-909-44",
        "created_at": "2022-11-13T20:30:05.000000Z",
        "updated_at": "2022-11-13T20:30:05.000000Z"
    },
    {
        "id": 11,
        "publisher_id": 13,
        "name": "To Kill a Mockingbird II",
        "description": "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. ...",
        "isbn": "978-1-56619-909-41",
        "created_at": "2022-11-13T20:30:21.000000Z",
        "updated_at": "2022-11-13T20:30:21.000000Z"
    }
]
```

</p>
</details>



Get a list of all available books
