<?php
namespace Burzum\SerializeTypes\Test\TestCase\Database\Type;

use Burzum\SerializeTypes\Database\Type\SerializeType;
use Cake\Database\Driver;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use PDO;

class SerializeTypeTest extends TestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->SerializeType = new SerializeType();
        $this->driver = $driver = $this->getMock('Cake\Database\Driver');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->SerializeType);
    }

    /**
     * testToPhp
     *
     * @return void
     */
    public function testToPhp()
    {
        $result = $this->SerializeType->toPhp(null, $this->driver);
        $this->assertInternalType('null', $result);

        $data = ['test' => 'test'];
        $value = serialize($data);
        $result = $this->SerializeType->toPhp($value, $this->driver);
        $this->assertInternalType('array', $result);
        $this->assertEquals($result, $data);
    }

    /**
     * testToDatabase
     *
     * @return void
     */
    public function testToDatabase()
    {
        $value = ['test' => 'test'];
        $result = $this->SerializeType->toDatabase($value, $this->driver);
        $this->assertEquals($result, 'a:1:{s:4:"test";s:4:"test";}');
    }

    /**
     * testToStatement
     *
     * @return void
     */
    public function testToStatement()
    {
        $result = $this->SerializeType->toStatement(null, $this->driver);
        $this->assertEquals($result, PDO::PARAM_NULL);

        $result = $this->SerializeType->toStatement(['data' => 'test'], $this->driver);
        $this->assertEquals($result, PDO::PARAM_STR);
    }

    /**
     * testMarshal
     *
     * @return void
     */
    public function testMarshal()
    {
        $result = $this->SerializeType->marshal('a:1:{s:4:"test";s:4:"test";}');
        $this->assertEquals($result, ['test' => 'test']);

        $value = ['test' => 'test'];
        $result = $this->SerializeType->marshal($value);
        $this->assertEquals($result, $value);
    }

}
