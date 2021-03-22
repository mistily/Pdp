<?php
<<<<<<< HEAD
=======

>>>>>>> 34ef086b1d4530876b21ac779dd9524872fb6325
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    /**
<<<<<<< HEAD
     ** @Route("/")
     **/
=======
    ** @Route("/")
    **/
>>>>>>> 34ef086b1d4530876b21ac779dd9524872fb6325
    public function index(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 34ef086b1d4530876b21ac779dd9524872fb6325
