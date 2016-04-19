<?php
namespace Burzum\SerializeTypes\Test\TestCase\Database\Type;

use Burzum\SerializeTypes\Database\Type\JsonType;
use Cake\Database\Driver;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use PDO;

class JsonTypeTest extends TestCase {

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
        $this->JsonType = new JsonType();
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
        unset($this->JsonType);
    }

    /**
     * testToPhp
     *
     * @return void
     */
    public function testToPhp()
    {
        $result = $this->JsonType->toPhp(null, $this->driver);
        $this->assertInternalType('null', $result);

        $data = ['test' => 'test'];
        $value = json_encode($data);
        $result = $this->JsonType->toPhp($value, $this->driver);
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
        $result = $this->JsonType->toDatabase($value, $this->driver);
        $this->assertEquals($result, '{"test":"test"}');
    }

    /**
     * testToStatement
     *
     * @return void
     */
    public function testToStatement()
    {
        $result = $this->JsonType->toStatement(null, $this->driver);
        $this->assertEquals($result, PDO::PARAM_NULL);

        $result = $this->JsonType->toStatement(['data' => 'test'], $this->driver);
        $this->assertEquals($result, PDO::PARAM_STR);
    }

    /**
     * testMarshal
     *
     * @return void
     */
    public function testMarshal()
    {
        $result = $this->JsonType->marshal('{"test":"test"}');
        $this->assertEquals($result, ['test' => 'test']);

        $value = ['test' => 'test'];
        $result = $this->JsonType->marshal($value);
        $this->assertEquals($result, $value);
    }

}
