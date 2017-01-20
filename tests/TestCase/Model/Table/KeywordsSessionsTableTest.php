<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KeywordsSessionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KeywordsSessionsTable Test Case
 */
class KeywordsSessionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KeywordsSessionsTable
     */
    public $KeywordsSessions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.keywords_sessions',
        'app.sessions',
        'app.keywords'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('KeywordsSessions') ? [] : ['className' => 'App\Model\Table\KeywordsSessionsTable'];
        $this->KeywordsSessions = TableRegistry::get('KeywordsSessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KeywordsSessions);

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
