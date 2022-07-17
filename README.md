
# gamebackend-symfony6.1-php8.1-docker

gamebackend is the application of tictactoe a game in which two players alternately 
put Xs and Os in compartments of a figure formed by two vertical lines crossing two horizontal lines and each tries to get a 
row of three Xs or three Os before the opponent does

1) Start the container

        $ docker-compose build

        $ docker-compose up

        $ docker-compose exec php bash

        $ composer install

2) the rules of the game

    2-1 ) start game and move player :
    
    link of the game is please tape this link in postman and choose the post method: 
    
                           http://localhost:8182/api/play/game

    The first step a player "X" OR "O" is going to send this information as the json request like this example

        {
            "toMove": "move",
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


   the second step the server will send json response that content a user ( "player_keyboard": "O" )   has made a move , display the current state "NotOver"  of the game,
   and the matrix of broads like this exemple.
      
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
                ] ,
                "broad": "",
                "current_state_of_the_game": "notOver",
                "winner": "",
                "player_keyboard": "O",
                "gamedata":  [

                ] ,
                "to_move": "move"
        }  
based at this informations player "O" can create his own json response like that  

        {
            "toMove": "move",
            "gamedata": [
                [
                    "X",
                    "",
                    ""
                ],
                [
                    "O",
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

2.3  the validation and unit testing,

the input should the "toMove" be not blank  and should have two choices "new_game" or "move"

            $ docker-compose exec php bash

            php vendor/bin/phpunit tests/unit/DtoSubscriberTest.php


in your postman

if you send this data of player with empty toMove


    {
        "toMove": "",
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

you will  receive this data as json request


    {
        "code": 500,
        "message": "Object(App\\Dto\\Tictactoe\\PlayerDto).toMove:\n    This value should not be blank. (code c1051bb4-d103-4f74-8988-acbcafc7fdc3)\n"
    }


in the case toMove take other value:


    {
        "toMove": "nothing",
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

you recieve json response at this format

    {
        "code": 500,
        "message": "Object(App\\Dto\\Tictactoe\\PlayerDto).toMove:\n    this field should to take two choices "move" or "new_game" (code 8e179f1b-97aa-4560-a02f-2a8b42e49df7)\n"
    }




2.4) The end the game  
    when one of player "O" or "X" wins for exemple "X", we will receive json responde format
        
        {
            "broads":[
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
            "gamedata": [

            ],
            "to_move": "new_game"
        }


the game is over and if you want to strat new game  and winner X

2.5) starting new game :
   
starting the new game based of the ending of game copie new_game from the last json response and pass it to json request like that 

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

1.3  the validation and unit testing, 

the input should the "toMove" be not blank  and should have two choices "new_game" or "move"

            $ docker-compose exec php bash

            php vendor/bin/phpunit tests/unit/DtoSubscriberTest.php

in your postman

if you send this data of player with empty toMove

    {
        "toMove": "",
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

you will  receive this data as json request



    {
        "code": 500,
        "message": "Object(App\\Dto\\Tictactoe\\PlayerDto).toMove:\n    This value should not be blank. (code c1051bb4-d103-4f74-8988-acbcafc7fdc3)\n"
    }

in the case :


    {
        "toMove": "nothing",
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

you recieve json response at this format 

    {
        "code": 500,
        "message": "Object(App\\Dto\\Tictactoe\\PlayerDto).toMove:\n    this field should to take two choices move or new_game (code 8e179f1b-97aa-4560-a02f-2a8b42e49df7)\n"
    }
