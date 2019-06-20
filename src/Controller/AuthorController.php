<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/authors", name="authors")
     */
    public function index(): Response
    {
        #TODO: cleanup
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    /**
     * @Route("/authors/{id}", name="authors.show")
     *
     * @param Author $author
     * @return Response
     */
    public function show(Author $author): Response
    {
        return $this->render(
            'author/show.html.twig', [
                'author' => $author,
            ]
        );
    }
}
