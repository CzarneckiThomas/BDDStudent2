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
        $schoolYearDatas = [
            [
                'name' => '2022',
                'started_at' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2022-09-01 09:00:00'),
                'finished_at' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2022-012-01 09:00:00'),
            ],
            [
                'name' => '2023',
                'started_at' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2023-09-01 09:00:00'),
                'finished_at' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2023-012-01 09:00:00'),
            ],
            [
                'name' => '2024',
                'started_at' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2024-09-01 09:00:00'),
                'finished_at' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2024-012-01 09:00:00'),
            ]
        ];

        foreach ($schoolYearDatas as $schoolYearData) {
            $schoolYear = new SchoolYear();
            $schoolYear->setName($schoolYearData['name']);
            $schoolYear->setStartedAt($schoolYearData['started_at']);
            $schoolYear->setFinishedAt($schoolYearData['finished_at']);

            $manager->persist($schoolYear);

        }

        $manager->flush();
    }

    // public function loadStudents(ObjectManager $manager, FakerGenerator $faker): void
    // {
    //     $schoolYearDatas = [
    //         [
    //             'firstname' => 'Thomas',
    //             'lastname' => 'Czarnecki',
    //             'email' => 'exemple@orange.fr',
    //         ],
    //         [
    //             'firstname' => 'Marion',
    //             'lastname' => 'Czar',
    //             'email' => 'exemple@free.fr',
    //         ],
    //         [
    //             'firstname' => 'Tim',
    //             'lastname' => 'Czar',
    //             'email' => 'exemple@laposte.fr',
    //         ],
           
    //     ];

    //     $manager->flush();
    // }

}
