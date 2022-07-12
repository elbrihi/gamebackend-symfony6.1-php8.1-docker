<?php


namespace App\Controller;

use App\Dto\Tictactoe\PlayerDto;
use App\Dto\Tictactoe\TictactoeDto;
use App\Dto\Tictactoe\TictactoeDtoInterface;
use App\Service\Serializer\DtoSerializer;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/')]
class ApiGameController extends AbstractController
{


        public function __construct(
            private TictactoeDtoInterface $tictactoeDto
        )
        {
        }

        #[Rest\View()]
        #[Rest\Get("take/turn",name: "api_take_turn")]
        public function takeTurn(DtoSerializer $serializer, Request $request)
        {


                $playerDto = $serializer->deserialize( $request->getContent(), PlayerDto::class,'json');



                $this->tictactoeDto->setPlayerKeyboard($playerDto->getPlayerKeyboard());

                $this->tictactoeDto->setBroad($this->getArrays());


                return $this->tictactoeDto;
        }

        private function getArrays():array
        {
            (array) $broad = [];
            $broad[0][0] = "";
            $broad[0][1] = "";
            $broad[0][2] = "";
            $broad[1][0] = "";
            $broad[1][1] = "";
            $broad[1][2] = "";
            $broad[2][0] = "";
            $broad[2][1] = "";
            $broad[2][2] = "";
            return $broad ;
        }


}
