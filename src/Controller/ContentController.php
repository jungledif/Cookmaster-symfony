<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContentController extends AbstractController
{

    /**
     *  @Route("/new", name="new")
     */
    public function create(Request $request): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeFormType::class, $recipe);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {

            $recipe->setAuthor($user);
            $recipe->setCreationDate(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($recipe);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('content/create.html.twig',  [
            'RecipeFormType' => $form->createView()
        ]);
    }
}
