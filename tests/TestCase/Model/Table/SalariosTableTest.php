<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalariosTable Test Case
 */
class SalariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalariosTable
     */
    protected $Salarios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Salarios',
        'app.Cargos',
        'app.Funcionarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Salarios') ? [] : ['className' => SalariosTable::class];
        $this->Salarios = $this->getTableLocator()->get('Salarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Salarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
