<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="default")
     * @Route("/search/{searchterm}", name="search", defaults={"searchterm":""})
     */
    public function index($search = null, EntityManagerInterface $manager, RecipeRepository $recipeRepo): Response
    {

        if (!empty($search)) {
            $recipes = $recipeRepo->search($search);
        } else {
            $recipes = $recipeRepo->findAll();
        }
        return $this->render('home/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
