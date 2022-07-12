<?php

namespace App\Dto\Tictactoe;

use App\Dto\Tictactoe\PlayerDtoInterface;
class TictactoeDto  implements TictactoeDtoInterface
{



    private ?array $broad ;

    private ?string $playerKeyboard;

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
