<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor1 = new Actor();
        $actor1->setName('Leonardo DiCaprio');
        $manager->persist($actor1);

        $actor2 = new Actor();
        $actor2->setName('Sam Worthington');
        $manager->persist($actor2);

        $actor3 = new Actor();
        $actor3->setName('Zoe Saldana');
        $manager->persist($actor3);

        $actor4 = new Actor();
        $actor4->setName('Joseph Gordon-Levitt');
        $manager->persist($actor4);

        $manager->flush();

        $this->addReference('actor_1', $actor1);
        $this->addReference('actor_2', $actor2);
        $this->addReference('actor_3', $actor3);
        $this->addReference('actor_4', $actor4);

    }
}
