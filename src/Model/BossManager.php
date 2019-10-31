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
class BossManager extends AbstractManager
{
    const TABLE = 'quizz';

    protected $pv = 50;
    protected $attaque = 15;

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    protected function setPv(int $degats){
        $this->pv -= $degats;
    }
    protected function getPv(){
        return $this->pv;
    }

    protected function attaque(int $enemyPv){
        $enemyPv -= $this->attaque;
        return 'A l\'attaque';
    }



}
