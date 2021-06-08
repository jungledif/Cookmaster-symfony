<?php

namespace App\Form;

use App\Entity\Recipe;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RecipeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un nom de recette.',
                    ])
                ]
            ])
            ->add('descriptive', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une description.',
                    ])
                ]
            ])
            ->add('type', ChoiceType::class, ['choices' => [
                'Type de plat' => [
                    'Cuisine' => 'Cuisine',
                    'Pâtisserie' => 'Pâtisserie'
                ]
            ]])
            ->add('level', ChoiceType::class, ['choices' => [
                'Difficulté' => [
                    'Facile' => 'Facile',
                    'Intermédiaire' => 'Intermédiaire',
                    'Difficile' => 'Difficile'
                ]
            ]])
            ->add('step1', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('step2', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('step3', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('recipeImg', UrlType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une image en URL',
                    ])
                ]
            ])
            ->add('cooktime', IntegerType::class, array(
                'attr' => [
                    'value' => 20,
                    'min' => 20,
                    'max' => 180,
                    'step' => 5

                ]
            ))
            ->add('servings', IntegerType::class, array(
                'attr' => [
                    'value' => 4,
                    'min' => 4,
                    'max' => 20,

                ]
            ))
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
