<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\SchoolYear;
use App\Entity\Student;
use App\Entity\Tag;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

class TestFixtures extends Fixture
{
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');

        $this->loadSchoolYears($manager, $faker);
        // $this->Students($manager, $faker);
        // $this->loadProjects($manager, $faker);
        // $this->loadTags($manager, $faker);
    }

    public function loadSchoolYears(ObjectManager $manager, FakerGenerator $faker): void
    {
        $SchoolYears = [
            '2000',
            '2001',
            '2002',
        ];

        $manager->flush();
    }

}
