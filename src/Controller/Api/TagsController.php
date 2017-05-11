<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
class TagsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500
    ];
}
