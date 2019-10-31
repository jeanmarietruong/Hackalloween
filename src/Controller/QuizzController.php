<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;


use App\Model\QuizzManager;

/**
 * Class quizzController
 *
 */
class QuizzController extends AbstractController
{



    public function index()
    {
        $quizzManager = new QuizzManager();
        $quizzs = $quizzManager->selectAll();

        return $this->twig->render('Quizz/index.html.twig', ['quizzs' => $quizzs]);
    }

    public function add()
    {
        $quizzManager = new QuizzManager();
        $quizzs = $quizzManager->movies();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quizz = [
                'nom' => $_POST['nom'],
                'question' => $_POST['question'],
                'reponse_a' => $_POST['reponse_a'],
                'reponse_b' => $_POST['reponse_b'],
                'reponse_c' => $_POST['reponse_c'],
                'reponse_d' => $_POST['reponse_d'],
                'reponse_juste' => $_POST['reponse_juste']
            ];
            $quizzManager->insert($quizz);

            //header('Location:/Quizz/quizzbuild');
        }
        return $this->twig->render('Quizz/add.html.twig', ['quizzs' => $quizzs]);
    }


    public function show()
    {
        $quizzManager = new QuizzManager();
        $quizzs = $quizzManager->quizz();



        return $this->twig->render('Quizz/show.html.twig', ['quizzs' => $quizzs]);
    }

    public function quizzbuild()
    {
        $quizzManager = new QuizzManager();
        $quizzs = $quizzManager->quizz();



        return $this->twig->render('Quizz/quizzbuild.html.twig', ['quizzs' => $quizzs]);
    }
}
