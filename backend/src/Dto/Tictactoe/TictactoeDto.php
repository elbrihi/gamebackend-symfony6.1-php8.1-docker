<?php

namespace App\Dto\Tictactoe;

class TictactoeDto
{
    private ?string $playerKeyboard ="X";

    private ?array $broad ;


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

    /**
     * @return array|null
     */
    public function getBroad(): ?array
    {
        return $this->broad;
    }

    /**
     * @param array|null $broad
     */
    public function setBroad(?array $broad): void
    {
        $this->broad = $broad;
    }



}
