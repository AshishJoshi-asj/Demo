<?php
/**
 * @covers DefaultClass::ashishittechnosoft\Demo\Hello
 */
class HelloTest extends PHPUnit_Framework_TestCase
{
    protected  $hello;
    public function setUp() {
        $this->hello = new ashishittechnosoft\Demo\Hello(); 
    }
    /*
     * @cover ::world
     */
    public function testWorld(){
        $this->assertSame('world',  $this->hello->world());
    }
}
