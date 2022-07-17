<?php


namespace App\Controller;

use App\Dto\Tictactoe\PlayerDto;
use App\Dto\Tictactoe\TictactoeDto;
use App\Dto\Tictactoe\TictactoeDtoInterface;
use App\Manager\Tictactoe\TicTacToeManagerInterface;
use App\Service\Serializer\DtoSerializer;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/')]
class ApiGameController extends AbstractController
{


        public function __construct(
            private TictactoeDtoInterface $tictactoeDto,
            private TicTacToeManagerInterface $ticTacToeManager,
            private RequestStack $requestStack
        )
        {
        }


        #[Rest\Post("play/game",name: "api_play_game")]
        public function playGame(DtoSerializer $serializer, Request $request, ValidatorInterface
        $validator)
        {

                $playerDto = $serializer->deserialize( $request->getContent(), PlayerDto::class,'json');


                $playerDto = $serializer->serialize($this->ticTacToeManager->playGame($playerDto), 'json');
                return new Response( $playerDto,200, ['Content-Type' => 'application/json']);

        }


}
