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
class CombatManager extends AbstractManager
{
    const TABLE = 'quizz';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


}
