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
class QuizzManager extends AbstractManager
{
    const TABLE = 'questions';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert(array $quizz): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (nom, question, reponse_a, reponse_b, reponse_c, reponse_d, reponse_juste) VALUES (:nom, :question, :reponse_a, :reponse_b, :reponse_c, :reponse_d, :reponse_juste)");

        $statement->bindValue('nom', $quizz['nom'], \PDO::PARAM_STR);
        $statement->bindValue('question', $quizz['question'], \PDO::PARAM_STR);
        $statement->bindValue('reponse_a', $quizz['reponse_a'], \PDO::PARAM_STR);
        $statement->bindValue('reponse_b', $quizz['reponse_b'], \PDO::PARAM_STR);
        $statement->bindValue('reponse_c', $quizz['reponse_c'], \PDO::PARAM_STR);
        $statement->bindValue('reponse_d', $quizz['reponse_d'], \PDO::PARAM_STR);
        $statement->bindValue('reponse_juste', $quizz['reponse_juste'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }

    public function movies()
    {
        {
            $client = HttpClient::create();
            $response = $client->request('GET', 'https://hackathon-wild-hackoween.herokuapp.com/movies');

            $statusCode = $response->getStatusCode(); // get Response status code 200

        if ($statusCode === 200) {
            $content = $response->getContent();

            $content = $response->toArray();
            return $content;
        }

        }
    }

    public function quizz()
    {
    }
}
