<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DegreesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DegreesTable Test Case
 */
class DegreesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DegreesTable
     */
    public $Degrees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.degrees',
        'app.subjects',
        'app.degrees_subjects',
        'app.teachers',
        'app.users',
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
        $config = TableRegistry::exists('Degrees') ? [] : ['className' => 'App\Model\Table\DegreesTable'];
        $this->Degrees = TableRegistry::get('Degrees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Degrees);

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
