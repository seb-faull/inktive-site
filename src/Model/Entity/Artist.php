<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Artist Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $parlour_id
 * @property string $minimum_cost
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Parlour $parlour
 * @property \App\Model\Entity\ArtistProfile[] $artist_profiles
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\Tag[] $tags
 */
class Artist extends Entity
{
	
	protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
	
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
