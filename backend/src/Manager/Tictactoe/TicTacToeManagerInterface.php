<?php

namespace App\Manager\Tictactoe;

use App\Dto\Tictactoe\PlayerDtoInterface;

interface TicTacToeManagerInterface
{
    public function playGame(PlayerDtoInterface $playerDto);
}
