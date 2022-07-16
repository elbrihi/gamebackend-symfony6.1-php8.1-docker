<?php

namespace App\Manager\Tictactoe;

use App\Cache\ArrayCache;
use App\Dto\Tictactoe\PlayerDto;
use App\Dto\Tictactoe\PlayerDtoInterface;
use App\Dto\Tictactoe\TictactoeDto;

use App\Dto\Tictactoe\TictactoeDtoInterface;
use Symfony\Component\HttpFoundation\RequestStack;


class TictactoeManager implements TicTacToeManagerInterface
{
    		//whose turn is

    public $playerKeyboard ;
    public $board = [];
    public function __construct
    (
        private PlayerDto $playerDto,
        private TictactoeDto $tictactoeDto,
        private RequestStack $requestStack,

    )
    {

        $this->session = $this->requestStack->getSession();
        $this->newBoard();
    }

    public function playGame(PlayerDtoInterface $playerDto):TictactoeDtoInterface
    {
        if ($playerDto->getToMove()  === "new_game")
        {
            $this->newBoard();
            $this->tictactoeDto->setBroads($this->newBoard());
            $this->tictactoeDto->setToMove("move");
            return $this->tictactoeDto;
        }
        $this->board = $playerDto->getGamedata();

        if ($this->isOver())
        {
            $this->tictactoeDto->setCurrentStateOfTheGame("Over");
            $this->tictactoeDto->setWinner($this->isOver());
            $this->playerDto->setPlayerKeyboard("");
            $this->tictactoeDto->setToMove("new_game");
        }


        $this->tictactoeDto->setBroads($playerDto->getGamedata());
        $this->changePlayerKeyboard($playerDto->getPlayerKeyboard());

        return $this->tictactoeDto;
    }
    private function changePlayerKeyboard(string $playerKeyboard):void
    {


        if (!$this->session->has("playerKeyboardToReserve"))
        {


            if ($playerKeyboard === "X")
            {
                $this->playerDto->setPlayerKeyboard("O");

            }else{
                $this->playerDto->setPlayerKeyboard("X");

            }

            $this->session->set("playerKeyboardToReserve",$this->tictactoeDto->getPlayerKeyboard());

            $this->playerKeyboard = $this->tictactoeDto->getPlayerKeyboard();


        }
        if ($this->session->has("playerKeyboardToReserve"))
        {

            if ($this->session->get("playerKeyboardToReserve") === "X")
            {

                $this->tictactoeDto->setPlayerKeyboard("O");

            }else{

                $this->tictactoeDto->setPlayerKeyboard("X");


            }
            $this->session->set("playerKeyboardToReserve",$this->tictactoeDto->getPlayerKeyboard());
            $this->playerKeyboard = $this->tictactoeDto->getPlayerKeyboard();
        }


    }

    function newBoard() {



        $this->board = array();
        //create the board
        for ($x = 0; $x <= 2; $x++)
        {
            for ($y = 0; $y <= 2; $y++)
            {
                $this->board[$x][$y] = "";
            }
        }
        return $this->board;



    }



    private function isOver()
    {

        if ($this->board[0][0] && $this->board[0][0] == $this->board[0][1] && $this->board[0][1] == $this->board[0][2])
            return $this->board[0][0];

        //middle row
        if ($this->board[1][0] && $this->board[1][0] == $this->board[1][1] && $this->board[1][1] == $this->board[1][2])
            return $this->board[1][0];

        //bottom row
        if ($this->board[2][0] && $this->board[2][0] == $this->board[2][1] && $this->board[2][1] == $this->board[2][2])
            return $this->board[2][0];

        //first column
        if ($this->board[0][0] && $this->board[0][0] == $this->board[1][0] && $this->board[1][0] == $this->board[2][0])
            return $this->board[0][0];

        //second column
        if ($this->board[0][1] && $this->board[0][1] == $this->board[1][1] && $this->board[1][1] == $this->board[2][1])
            return $this->board[0][1];

        //third column
        if ($this->board[0][2] && $this->board[0][2] == $this->board[1][2] && $this->board[1][2] == $this->board[2][2])
            return $this->board[0][2];

        //diagonal 1
        if ($this->board[0][0] && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2])
            return $this->board[0][0];

        //diagonal 2
        if ($this->board[0][2] && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0])
            return $this->board[0][2];

        if ($this->totalMoves >= 9)
            return "Tie";



    }


}
