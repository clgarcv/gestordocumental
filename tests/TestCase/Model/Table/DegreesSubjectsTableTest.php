<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DegreesSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DegreesSubjectsTable Test Case
 */
class DegreesSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DegreesSubjectsTable
     */
    public $DegreesSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.degrees_subjects',
        'app.degrees',
        'app.teachers',
        'app.users',
        'app.subjects',
        'app.sessions',
        'app.keywords',
        'app.keywords_sessions',
        'app.subjects_teachers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DegreesSubjects') ? [] : ['className' => 'App\Model\Table\DegreesSubjectsTable'];
        $this->DegreesSubjects = TableRegistry::get('DegreesSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DegreesSubjects);

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
