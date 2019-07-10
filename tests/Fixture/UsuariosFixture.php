<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'armscii8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'contraseña' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'armscii8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nombres' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'armscii8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'apellidos' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'armscii8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'perfil' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => false, 'default' => null, 'collate' => 'armscii8_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'armscii8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'contraseña' => 'Lorem ipsum dolor sit amet',
                'nombres' => 'Lorem ipsum dolor sit amet',
                'apellidos' => 'Lorem ipsum dolor sit amet',
                'perfil' => 'Lo'
            ],
        ];
        parent::init();
    }
}
