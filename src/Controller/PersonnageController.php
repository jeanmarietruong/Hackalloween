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


use App\Model\PersonnageManager;

/**
 * Class personnageController
 *
 */
class PersonnageController extends AbstractController
{



    public function index()
    {
        $personnageManager = new PersonnageManager();
        $personnages = $personnageManager->selectAll();

        return $this->twig->render('Personnage/index.html.twig', ['personnages' => $personnages]);
    }



    public function show()
    {
        $personnageManager = new personnageManager();
        $personnages = $personnageManager->personnage();



        return $this->twig->render('Personnage/show.html.twig', ['personnages' => $personnages]);
    }


    /**
     * Display personnage edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function edit(int $id): string
    {
        $personnageManager = new personnageManager();
        $personnage = $personnageManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $personnage['title'] = $_POST['title'];
            $personnageManager->update($personnage);
        }

        return $this->twig->render('personnage/edit.html.twig', ['personnage' => $personnage]);
    }


    /**
     * Display personnage creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $personnageManager = new personnageManager();
            $personnage = [
                'title' => $_POST['title'],
            ];
            $id = $personnageManager->insert($personnage);
            header('Location:/personnage/show/' . $id);
        }

        return $this->twig->render('personnage/add.html.twig');
    }


    /**
     * Handle personnage deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $personnageManager = new personnageManager();
        $personnageManager->delete($id);
        header('Location:/personnage/index');
    }


}
