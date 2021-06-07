<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Recipe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    private function encode($user, $plaintextpassword)
    {
        return $this->passwordEncoder->encodePassword(
            $user,
            $plaintextpassword
        );
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setNickname(strtolower($faker->firstName()));
            $user->setPassword($this->encode($user, "toto"));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);

            for ($i = 0; $i < 10; $i++) {
                $oneRecipe = new Recipe();
                $oneRecipe->setTitle($faker->sentence(1));
                $oneRecipe->setDescriptive($faker->text(255));
                $oneRecipe->setType($faker->sentence(1));
                $oneRecipe->setLevel($faker->sentence(1));
                $oneRecipe->setStep1($faker->text(255));
                $oneRecipe->setStep2($faker->text(255));
                $oneRecipe->setStep3($faker->text(255));
                $oneRecipe->setRecipeImg("https://www.lespatisseriesdaurelien.fr/wp-content/uploads/2021/05/Fraisier-9.jpg");
                $oneRecipe->setCooktime($faker->randomDigitNotNull(1));
                $oneRecipe->setServings($faker->randomDigitNotNull(1));

                $oneRecipe->setAuthor($user);
                $manager->persist($oneRecipe);
            }

            $manager->flush();
        }
    }
}
