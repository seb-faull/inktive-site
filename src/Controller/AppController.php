<?php
namespace App\Controller;
use Cake\Controller\Controller;
class AppController extends Controller {
    use \Crud\Controller\ControllerTrait;
    public $components = [
		'Flash',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ]
        ]
    ];
}