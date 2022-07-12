<?php

namespace App\Dto\Tictactoe;

interface PlayerDtoInterface
{
    public function getPlayerKeyboard(): ?string;

    /**
     * @param string|null $playerKeyboard
     */
    public function setPlayerKeyboard(?string $playerKeyboard): void;
}
