<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
use Cake\Log\Log;

class PostsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500
    ];
	
	public function add() {
		
		$this->Crud->on('beforeSave', function(\Cake\Event\Event $event) {
		
			if(!empty($this->request->data['upload']['name'])) {
				
				$file = $this->request->data['upload'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				
				$arr_ext = ['jpg', 'png']; //set allowed extensions
				
				$newFileName = time() . "_" . rand(000000, 999999);
	
				//only process if the extension is valid
				if (in_array($ext, $arr_ext)) {
				  //do the actual uploading of the file. First arg is the tmp name, second arg is
				  //where we are putting it
				  move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/posts/' . $newFileName . '.' . $ext);
		
				  //prepare the filename for database entry
				  $imageFileName = $newFileName;
		
				  $event->subject->entity->file_name = $imageFileName;
				  
				}
				
				
			}

		});
		
		$this->Crud->execute();
		
	}
	
}

