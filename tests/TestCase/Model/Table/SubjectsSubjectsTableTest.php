<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubjectsSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubjectsSubjectsTable Test Case
 */
class SubjectsSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubjectsSubjectsTable
     */
    public $SubjectsSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subjects_subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubjectsSubjects') ? [] : ['className' => 'App\Model\Table\SubjectsSubjectsTable'];
        $this->SubjectsSubjects = TableRegistry::get('SubjectsSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubjectsSubjects);

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
}
