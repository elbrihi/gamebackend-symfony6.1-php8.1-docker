<?php

namespace App\Dto\Tictactoe;

use App\Dto\Tictactoe\PlayerDtoInterface;
class TictactoeDto extends PlayerDto implements TictactoeDtoInterface
{


    private ?array $broads = [];

    private ?string  $broad ='' ;

    public ?string $currentStateOfTheGame = "notOver";

    public ?string $winner = "";



    /**
     * @return array|null
     */
    public function getBroads(): ?array
    {
        return $this->broads;
    }

    /**
     * @param array|null $broad
     */
    public function setBroads(?array $broads): void
    {
        $this->broads = $broads;
    }



    /**
     * @return string|null
     */
    public function getBroad(): ?string
    {
        return $this->broad;
    }

    /**
     * @param string|null $broad
     */
    public function setBroad(?string $broad): void
    {
        $this->broad = $broad;
    }

    /**
     * @return string|null
     */
    public function getCurrentStateOfTheGame(): ?string
    {
        return $this->currentStateOfTheGame;
    }

    /**
     * @param string|null $currentStateOfTheGame
     */
    public function setCurrentStateOfTheGame(?string $currentStateOfTheGame): void
    {
        $this->currentStateOfTheGame = $currentStateOfTheGame;
    }

    /**
     * @return string|null
     */
    public function getWinner(): ?string
    {
        return $this->winner;
    }

    /**
     * @param string|null $winner
     */
    public function setWinner(?string $winner): void
    {
        $this->winner = $winner;
    }





}
