<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// C'est le projet que Steeve utilise pour ses tests 

header("Acces-Control-Allow-Orign:.*");

class DefaultController extends AbstractController
{
    /**
     * @Route("/api/posts/{id}", name="api_post_index", methods={"GET"})       
     */
    public function index($id)                                                              
    {

            
                 
        $semaines = json_decode(file_get_contents('semaines.json'), true);  
          
        
        for($j = 0; $j < count($semaines); $j++){

            if($semaines[$j]["id"] == $id){

                return $this->json($semaines[$j]);
            }
        }


      return new Response("Aucun cours n'a encore été programmé pour cette semaine");                        
        
    }
}
   