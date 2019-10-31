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


    public function personnage()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://hackathon-wild-hackoween.herokuapp.com/monsters');
        $statusCode = $response->getStatusCode(); // get Response status code 200

        if ($statusCode === 200) {
            $content = $response->getContent();

            $content = $response->toArray();

            return $content;
        }
    }

    public function monperso(int $id): array
    {
            $client = HttpClient::create();
        try {
            $response = $client->request('GET', 'https://hackathon-wild-hackoween.herokuapp.com/monsters/'.$id.'');
        } catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
        }
        try {
            $statusCode = $response->getStatusCode();
        } catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
        } // get Response status code 200
        if ($statusCode === 200) {
            try {
                $content = $response->getContent();
            } catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
            }
            // get the response in JSON format
            try {
                $content = $response->toArray();
            } catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface $e) {
            } catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
            }
            // convert the response (here in JSON) to an PHP array
        }
            return $content;
    }
}
