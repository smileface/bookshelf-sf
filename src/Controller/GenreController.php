<?php

namespace App\Controller;

use App\Entity\Genre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/genres", name="genres")
     *
     * @return Response
     */
    public function index(): Response
    {
        //TODO: cleanup
        return $this->render('genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }

    /**
     * @Route("/genres/{id}")
     *
     * @param Genre $genre
     * @return Response
     */
    public function show(Genre $genre): Response
    {
        return new Response(sprintf('ID: %d , name: %s', $genre->getId(), $genre->getName()));
    }

    /**
     * @Route("/genres/name/{name}")
     *
     * @param string $name
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function getByName(string $name, EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Genre::class);
        /** @var Genre $genre */
        $genre = $repository->findOneBy(['name' => $name]);

        if (!$genre) {
            throw $this->createNotFoundException(sprintf('No genre by name "%s"', $name));
        }

        return new Response(sprintf('Found ID: %d , name: %s', $genre->getId(), $genre->getName()));
    }
}
