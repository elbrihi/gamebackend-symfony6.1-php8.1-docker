<?php

namespace App\Manager\Tictactoe;

use App\Dto\Tictactoe\PlayerDtoInterface;
use App\Dto\Tictactoe\TictactoeDtoInterface;

interface TicTacToeManagerInterface
{
    public function playGame(PlayerDtoInterface $playerDto):TictactoeDtoInterface;
}
