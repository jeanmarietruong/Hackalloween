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
class CombatController extends AbstractController
{



    public function index(string $recherche)
    {
        $personnageManager = new PersonnageManager();
        $personnages = $personnageManager->recherche($recherche);

        return $this->twig->render('Recherche/index.html.twig', ['personnages' => $personnages]);
    }




}
