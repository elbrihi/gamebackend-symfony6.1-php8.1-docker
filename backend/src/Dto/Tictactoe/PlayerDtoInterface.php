<?php

namespace App\Dto\Tictactoe;

interface PlayerDtoInterface
{
    public function getPlayerKeyboard(): ?string;

    public function setPlayerKeyboard(?string $playerKeyboard): void;

    public function getGamedata(): ?array;

    public function setGamedata(?array $gamedata);
}
