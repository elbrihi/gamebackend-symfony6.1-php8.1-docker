<?php

namespace App\Manager;

use App\Dto\Tictactoe\TictactoeDto;

class TictactoeManager
{
        public function __construct(private TictactoeDto $tictactoeDto)
        {
        }
}
