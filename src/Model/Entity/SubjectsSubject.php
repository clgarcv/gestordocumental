<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubjectsSubject Entity
 *
 * @property int $id
 * @property int $subject_id1
 * @property int $subject_id2
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class SubjectsSubject extends Entity
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
        'subject_id1' => false,
        'subject_id2' => false
    ];
}
