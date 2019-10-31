<?php


namespace App\Controller;

use App\Model\TestManager;
use Symfony\Component\HttpClient\HttpClient;

class TestController extends AbstractController
{

    public function index()
    {
            $testManager = new TestManager();
            $test        = $testManager->test();

            return $this->twig->render('test/index.html.twig', ['test' => $test]);
    }

    public function test()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $testManager = new TestManager();
            $test1 = [
                'search' => $_GET['search'],
            ];
            $id = $testManager->test1($test1);
            header('Location:/test/test/'. $id);
        }

        return $this->twig->render('test/test.html.twig', ['search' => $test1]);
    }
}
