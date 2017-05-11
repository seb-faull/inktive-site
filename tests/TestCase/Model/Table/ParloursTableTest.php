<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParloursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParloursTable Test Case
 */
class ParloursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParloursTable
     */
    public $Parlours;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parlours',
        'app.artists',
        'app.posts',
        'app.tags',
        'app.artists_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Parlours') ? [] : ['className' => 'App\Model\Table\ParloursTable'];
        $this->Parlours = TableRegistry::get('Parlours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parlours);

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
