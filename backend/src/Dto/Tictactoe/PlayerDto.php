<?php

namespace App\Dto\Tictactoe;

use Symfony\Component\Validator\Constraints as Assert;

class PlayerDto implements PlayerDtoInterface
{


    #[Assert\NotBlank]
    private ?string $playerKeyboard ="X";

    #[Assert\NotBlank]
    public ?array $gamedata = [];

    private ?string $toMove = "move";
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
    public function setPlayerKeyboard(?string $playerKeyboard ): void
    {
        $this->playerKeyboard = $playerKeyboard;
    }



    /**
     * @return array|null
     */
    public function getGamedata(): ?array
    {
        return $this->gamedata;
    }

    /**
     * @param array|null $gamedata
     */
    public function setGamedata(?array $gamedata): void
    {
        $this->gamedata = $gamedata;
    }

    /**
     * @return string|null
     */
    public function getToMove(): ?string
    {
        return $this->toMove;
    }

    /**
     * @param string|null $toMove
     */
    public function setToMove(?string $toMove): void
    {
        $this->toMove = $toMove;
    }


}
