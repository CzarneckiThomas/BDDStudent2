<?php

namespace App\Controller;

use DateTime;
// use App\Entity\Project;
use App\Entity\SchoolYear;
use App\Entity\Student;
// use App\Entity\Tag;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DbTestController extends AbstractController
{
    #[Route('/db/testfixtures', name: 'app_db_test_fixtures')]
    public function fixtures(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(SchoolYear::class);
        $schoolYears = $repository->findAll();
        dump($schoolYears);

        $repository = $doctrine->getRepository(Student::class);
        $students = $repository->findAll();
        dump($students);

        exit();
    }
}
