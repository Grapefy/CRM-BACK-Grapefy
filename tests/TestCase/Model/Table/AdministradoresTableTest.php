<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministradoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministradoresTable Test Case
 */
class AdministradoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministradoresTable
     */
    protected $Administradores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Administradores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Administradores') ? [] : ['className' => AdministradoresTable::class];
        $this->Administradores = $this->getTableLocator()->get('Administradores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Administradores);

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
}
