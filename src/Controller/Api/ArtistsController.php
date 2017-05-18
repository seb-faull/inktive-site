<title>has many</title>
<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
class ArtistsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500,
		'contain' => ['Parlours', 'Tags']
    ];
	
	
}