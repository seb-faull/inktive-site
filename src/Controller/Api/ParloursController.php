<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
class ParloursController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500
    ];
}