<?php


namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class TestManager extends AbstractManager
{
    const TABLE = 'user';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function test()
    {
        $client     = HttpClient::create();
        $response   = $client->request('GET', 'https://hackathon-wild-hackoween.herokuapp.com/movies');
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->getContent();

            $content = $response->toArray();

            return $content;
        }
    }

    public function test1(array $test1)
    {
        $client1     = HttpClient::create();
        $response   = $client1->request('GET', 'https://hackathon-wild-hackoween.herokuapp.com/movies/search/title/'.$test1);
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->getContent();

            $content = $response->toArray();
            var_dump($content);
            return $content;
        }
    }

}