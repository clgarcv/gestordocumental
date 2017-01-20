<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subject Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property string $modulo
 * @property int $curso
 * @property string $semestre
 * @property string $materia
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Degree[] $degrees
 * @property \App\Model\Entity\Subject[] $subjects
 * @property \App\Model\Entity\Teacher[] $teachers
 */
class Subject extends Entity
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
}
