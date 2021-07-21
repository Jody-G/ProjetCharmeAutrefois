<?php

namespace App\DataFixtures;

use App\Entity\Actualite;
use App\Entity\Categorie;
use App\Entity\Realisation;
use App\Entity\User;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(
        UserPasswordEncoderInterface $encoder,
        Slugify $slugify)
    {
        $this->encoder = $encoder;
        $this->slugger = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        //Ajout Utilisateurs
        $user = new User();

        $user->setEmail('admin@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setRoles(['ROLE_ADMIN']);

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        
        //Ajout Actualités
        for ($i=1; $i < 11; $i++) {
            $actualite = new Actualite();

            $actualite->setTitre('Actualité '.$i)
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContenu($faker->text(350))
                ->setSlug($this->slugger->generate($actualite->getTitre()))
                ->setFile($faker->imageUrl(300, 300, 'animals', true, 'cats'))
                ->setUser($user);

            $manager->persist($actualite);
        }

        //Ajout Categories
        for ($k=1; $k < 3; $k++) {
            $categorie = new Categorie();

            $categorie->setNom('Categorie '.$k)
                ->setSlug($this->slugger->generate($categorie->getNom()));

            $manager->persist($categorie);

            //Ajout Realisations
            for ($j=1; $j < 4; $j++) {
                $realisation = new Realisation();

                $realisation->setNom('Réalisation '.$j)
                    ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setDescription($faker->text())
                    ->setSlug($this->slugger->generate($realisation->getNom()))
                    ->setCategorie($categorie)
                    ->setFile($faker->imageUrl(360, 360, 'animals', true, 'cats'))
                    ->setUser($user);

                $manager->persist($realisation);
            }
        }

        $manager->flush();
    }
}
