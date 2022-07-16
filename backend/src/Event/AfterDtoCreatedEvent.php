<?php

namespace App\Event;

use App\Dto\Tictactoe\PlayerDto;
use App\Dto\Tictactoe\PlayerDtoInterface;
use Symfony\Contracts\EventDispatcher\Event;



class AfterDtoCreatedEvent extends Event
{
    public const NAME='dto.created';

    public function __construct(protected PlayerDtoInterface $dto)
    {

    }
    public function getDto(): PlayerDtoInterface
    {
        return $this->dto;
    }
}
