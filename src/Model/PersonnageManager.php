<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;
use Symfony\Component\HttpClient\HttpClient;

/**
 *
 */
class PersonnageManager extends AbstractManager
{
    const TABLE = 'user';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function personnage ( ){
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://hackathon-wild-hackoween.herokuapp.com/monsters');

        $statusCode = $response->getStatusCode(); // get Response status code 200

        if ($statusCode === 200) {
             $content = $response->getContent();

             $content = $response->toArray();

        return $content;
        }
    }

}
