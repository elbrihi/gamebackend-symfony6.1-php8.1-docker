<?php

namespace App\Dto\Tictactoe;

interface TictactoeDtoInterface
{


    /**
     * @return array|null
     */
    public function getBroad(): ?array;


    /**
     * @param array|null $broad
     */
    public function setBroad(?array $broad): void;

    /**
     * @return string|null
     */
    public function getPlayerKeyboard(): ?string;

    /**
     * @param string|null $playerKeyboard
     */
    public function setPlayerKeyboard(?string $playerKeyboard): void;
}
