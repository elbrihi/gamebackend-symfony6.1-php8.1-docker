<?php

namespace App\Tests\unit;

use App\Dto\Tictactoe\PlayerDto;
use App\Event\AfterDtoCreatedEvent;
use App\Tests\ServiceTestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class DtoSubscriberTest extends ServiceTestCase
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function testA_dto_is_validated_after_has_been_created()
        {
            $dto = new PlayerDto();

            $dto->setToMove("");

            $dto->setToMove("nothing");
            $event = new AfterDtoCreatedEvent($dto);

            /*** @var EventDispatcherInterface $eventDispatcher **/

            $eventDispatcher = $this->container->get('event_dispatcher');

            $this->expectException(ValidationFailedException::class);

            $this->expectExceptionMessage("This value should not be blank.");


            $this->expectExceptionMessage("this field should to take two choices move or new_game");


            $eventDispatcher->dispatch($event, $event::NAME);
        }
}
