<?php


namespace App\Controller;

use App\Model\TestManager;
use Symfony\Component\HttpClient\HttpClient;

class TestController extends AbstractController
{

    public function index()
    {
            $testManager = new TestManager();
            $test = $testManager->test();

            return $this->twig->render('test/index.html.twig', ['test' => $test]);
    }

    public function show(int $id)
    {
            $testManager = new TestManager();
            $resutat = $testManager->selectOneById($id);

            return $this->twig->render('Item/show.html.twig', ['resultat' => $resutat]);
    }
}
