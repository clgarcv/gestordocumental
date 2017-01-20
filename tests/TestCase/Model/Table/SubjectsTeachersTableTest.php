<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubjectsTeachersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubjectsTeachersTable Test Case
 */
class SubjectsTeachersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubjectsTeachersTable
     */
    public $SubjectsTeachers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subjects_teachers',
        'app.teachers',
        'app.users',
        'app.subjects',
        'app.degrees',
        'app.degrees_subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubjectsTeachers') ? [] : ['className' => 'App\Model\Table\SubjectsTeachersTable'];
        $this->SubjectsTeachers = TableRegistry::get('SubjectsTeachers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubjectsTeachers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
