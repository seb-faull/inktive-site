<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArtistProfile Entity
 *
 * @property int $id
 * @property int $artist_id
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Artist $artist
 */
class ArtistProfile extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
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

use Cake\Auth\DefaultPasswordHasher;
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }