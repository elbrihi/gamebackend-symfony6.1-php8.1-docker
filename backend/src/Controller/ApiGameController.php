<?php


namespace App\Controller;

use App\Dto\Tictactoe\TictactoeDto;
use App\Service\Serializer\DtoSerializer;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/')]
class ApiGameController extends AbstractController
{


        public function __construct(private TictactoeDto $tictactoeDto)
        {
        }

        #[Rest\View()]
        #[Rest\Get("take/turn",name: "api_take_turn")]
        public function takeTurn(DtoSerializer $serializer, Request $request)
        {


                $tictactoeDto = $serializer->deserialize( $request->getContent(), TictactoeDto::class,'json');

               dd($tictactoeDto);

            dd('hello!');



        }

        /* (array) $broad = [];
            $broad[0][0] = "X";
            $broad[0][1] = "X";
            $broad[0][2] = "X";
            $broad[1][0] = "X";
            $broad[1][1] = "X";
            $broad[1][2] = "X";
            $broad[2][0] = "X";
            $broad[2][1] = "X";
            $broad[2][2] = "X";
            return
                $response = new JsonResponse([
                "player" => "X",
                "broad" => $broad,

            ]);*/
}
