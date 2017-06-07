<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class ArtistsController extends AppController
{	
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token']);
    } 
	
//Artists registration
public function add()
{
		
    $this->Crud->on('afterSave', function(Event $event) {
        if ($event->subject->created) {
            $this->set('data', [
                'id' => $event->subject->entity->id,
                'token' => JWT::encode(
                    [
                        'sub' => $event->subject->entity->id,
                        'exp' =>  time() + 604800
                    ],
                Security::salt())
            ]);
            $this->Crud->action()->config('serialize.data', 'data');
        }
    });
    return $this->Crud->execute();
} 

//Verify Token request
public function token()
{
    $artist = $this->Auth->identify();
    if (!$artist) {
        throw new UnauthorizedException('Invalid email or password');
    }
    $this->set([
        'success' => true,
		'artist' => $artist,
        'data' => [
            'token' => JWT::encode([
                'sub' => $artist['id'],
                'exp' =>  time() + 604800
            ],
            Security::salt())
        ],
        '_serialize' => ['success', 'data', 'artist']
    ]);
}
      
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500,
		'contain' => ['Parlours', 'Tags']
    ];
	
	
}