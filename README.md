# gamebackend-symfony6.1-php8.1-docker

1. Start the container

$ docker-compose build

$ docker-compose up

$ docker-compose exec php bash

$ composer install

2.1

the link of the application is http://localhost:8182/api/take/turn

Player "X" OR "O" send data can at this exemple  
{
"toMove": "toMove",
"gamedata": [
        [
            "X",
            "",
            ""
        ],
        [
            "X",
            "O",
            ""
        ],
        [
            "O",
            "",
            ""
        ]

    ]

}
