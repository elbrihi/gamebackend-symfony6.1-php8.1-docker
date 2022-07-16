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

        #[Rest\View()]
        #[Rest\Post("take/turn",name: "api_take_turn")]
        public function playGame(DtoSerializer $serializer, Request $request, ValidatorInterface
        $validator)
        {
            try {
                $session = $this->requestStack->getSession();

                $playerDto = $serializer->deserialize( $request->getContent(), PlayerDto::class,'json');

                $errors = $validator->validate($playerDto);

                if (count($errors) > 0)
                {
                    return $this->json($errors, 400);
                }
                $this->ticTacToeManager->playGame($playerDto);

                $tictactoe = $serializer->serialize($this->ticTacToeManager->playGame($playerDto), 'json');

                return new Response($tictactoe,200, ['Content-Type' => 'application/json']);
            }catch (NotEncodableValueException $e)
            {
                return $this->json([
                    'status' => 400,
                    'message' => $e->getMessage()
                ],400);
            }



        }


}
