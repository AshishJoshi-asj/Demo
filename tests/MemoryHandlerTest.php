<?php
use ashishittechnosoft\Demo\MemoryHandler;

class MemoryHandlerTest extends PHPUnit_Framework_TestCase
{
    /*
     * @val $handler 
     */
    protected $handler;
    public function setUp() {
        $this->handler = new MemoryHandler();
    }
    
    public function testImplementHandlerInterface(){
        $this->assertInstanceOf('ashishittechnosoft\Demo\HandlerInterface', $this->handler);
    }
    
    public function testWriteToInternal(){
        // 1st Assertion
        $this->handler->write("Tue, 16 Jun 2015 13:29:44 +0200","Hello World!");
        $this->assertInternalType('array', $this->handler->getEntries());
        $this->assertCount(1, $this->handler->getEntries());
        $this->assertEquals(array("[Tue, 16 Jun 2015 13:29:44 +0200] Hello World!"), $this->handler->getEntries());
        
        //2nd Assertion
         $this->handler->write("Sat, 16 Jun 2015 13:29:44 +0200","Hello World! again");
        $this->assertInternalType('array', $this->handler->getEntries());
        $this->assertCount(2, $this->handler->getEntries());
        $this->assertEquals(
                array(
                        "[Tue, 16 Jun 2015 13:29:44 +0200] Hello World!",
                        "[Sat, 16 Jun 2015 13:29:44 +0200] Hello World! again"
                    ), $this->handler->getEntries());
    }
}
