<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcesosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcesosTable Test Case
 */
class ProcesosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcesosTable
     */
    public $Procesos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Procesos',
        'app.Municipios',
        'app.Usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Procesos') ? [] : ['className' => ProcesosTable::class];
        $this->Procesos = TableRegistry::getTableLocator()->get('Procesos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Procesos);

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
