# gamebackend-symfony6.1-php8.1-docker

**1. Start the container**

$ docker-compose build

$ docker-compose up

$ docker-compose exec php bash

$ composer install

2.  the rules of the game

2-1 ) start game and move player 
tape http://localhost:8182/api/take/turn

Player "X" OR "O" send data can sent this data   
{
"toMove": "new_game",
"gamedata": [
        [
            "X",
            "",
            ""
        ],
        [
            "",
            "",
            ""
        ],
        [
            "",
            "",
            ""
        ]

    ]
}



then the server will send json response format as:
{
"broads": [
        [
            "X",
            "",
            ""
        ],
        [
            "",
            "",
            ""
        ],
        [
            "",
            "",
            ""
        ]
],
    "broad": "",
    "current_state_of_the_game": "notOver",
    "winner": "",
    "player_keyboard": "O",
    "gamedata": [],
    "to_move": "move"
} 
content  a user ( "player_keyboard": "O" )   has made a move , display the current state "NotOver"  of the game, 
and the matrix of broads

2-1 ) end game 

I played this example that gave me this result as json response
{
"broads": [
    [
        "X",
        "X",
        "X"
    ],
    [
        "O",
        "O",
        ""
    ],
    [
        "",
        "",
        ""
    ]
],
"broad": "",
"current_state_of_the_game": "Over",
"winner": "X",
"player_keyboard": "O",
"gamedata": [],
"to_move": "new_game"
}
that content of the  winner X curent state of the game is over and to_move new game the possibility  if you want to new game 
in this case just you need to copy new_game from to_move and past it to json request like that
{
"toMove": "new_game",
"gamedata": [
    [
        "X",
        "X",
        "X"
    ],
    [
        "O",
        "O",
        ""
    ],
    [
        "",
        "",
        ""
    ]
    ]        
}
then you will get broads totally empty 
{
    "broads": [
        [
            "",
            "",
            ""
        ],
        [
            "",
            "",
            ""
        ],
        [
            "",
            "",
            ""
        ]
    ],
    "broad": "",
    "current_state_of_the_game": "notOver",
    "winner": "",
    "player_keyboard": "X",
    "gamedata": [],
    "to_move": "move"
}



