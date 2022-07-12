<?php

namespace App\Dto\Tictactoe;

class PlayerDto implements PlayerDtoInterface
{
    private ?string $playerKeyboard ="X";


    /**
     * @return string|null
     */
    public function getPlayerKeyboard(): ?string
    {
        return $this->playerKeyboard;
    }

    /**
     * @param string|null $playerKeyboard
     */
    public function setPlayerKeyboard(?string $playerKeyboard): void
    {
        $this->playerKeyboard = $playerKeyboard;
    }

}
