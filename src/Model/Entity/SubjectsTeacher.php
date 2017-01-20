<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubjectsTeacher Entity
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $subject_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Teacher $teacher
 * @property \App\Model\Entity\Subject $subject
 */
class SubjectsTeacher extends Entity
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
        'subject_id' => false,
        'teacher_id' => false
    ];
}
