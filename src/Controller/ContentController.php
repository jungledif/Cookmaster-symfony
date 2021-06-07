<?php

namespace App\Controller;

use App\Entity\Recipe;

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
        $user = $this->getUser();
        if ($user != null && $request->request->has("title") && $request->request->has("descriptive") && $request->request->has("recipeImg")) {
            $title = $request->request->get("title");
            $descriptive = $request->request->get("descriptive");
            $recipeImg = $request->request->get("recipeImg");
            $type = $request->request->get("type");
            $level = $request->request->get("level");
            $step1 = $request->request->get("step1");
            $step2 = $request->request->get("step2");
            $step3 = $request->request->get("step3");
            $cooktime = $request->request->get("cooktime");
            $servings = $request->request->get("servings");

            $newRecipe = new Recipe();

            $newRecipe->setAuthor($user);
            $newRecipe->setTitle($title);
            $newRecipe->setDescriptive($descriptive);
            $newRecipe->setRecipeImg($recipeImg);
            $newRecipe->setType($type);
            $newRecipe->setLevel($level);
            $newRecipe->setStep1($step1);
            $newRecipe->setStep2($step2);
            $newRecipe->setStep3($step3);
            $newRecipe->setCooktime($cooktime);
            $newRecipe->setServings($servings);
            $newRecipe->setCreationDate(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newRecipe);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('content/create.html.twig',  []);
    }
}
