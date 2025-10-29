<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie1 = new Movie();
        $movie1->setTitle('Inception');
        $movie1->setReleaseYear(2010);
        $movie1->setDescription('A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.');
        $movie1->setImagePath('https://cdn.pixabay.com/photo/2023/08/01/11/02/ai-generated-8162711_1280.png');

        $movie1->addActor($this->getReference('actor_1', Actor::class));
        $movie1->addActor($this->getReference('actor_2', Actor::class));

        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('Avatar');
        $movie2->setReleaseYear(2009);
        $movie2->setDescription('A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2024/01/15/16/57/avatar-8510529_1280.jpg');

        $movie2->addActor($this->getReference('actor_3', Actor::class));
        $movie2->addActor($this->getReference('actor_4', Actor::class));

        $manager->persist($movie2);

        $manager->flush();


    }
}
