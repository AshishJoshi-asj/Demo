<?php
use ashishittechnosoft\Demo\Logger;
//var_dump(class_exists('\Enlog\Logger'));
//exit;
class LoggerTest extends PHPUnit_Framework_TestCase
{
    /*
     * @var $logger \Enlog\Logger;
     */
    protected $logger;
    
    public function setUp(){
        $this->logger = new Logger();
        
    }
    
    public function testInstance(){
        
        $this->assertInstanceOf('\ashishittechnosoft\Demo\Logger',$this->logger);
    }
    
    public function testRegistersHandlerCorrectly(){
        $handler = $this->getHandlerMock();
        $this->logger->registerHandler('memory',$handler);
        $this->assertSame($handler, $this->logger->getHandler('memory'));
    }
    
    public function testRegistersMoreThanOneHandlerCorrectly(){
        $handler = $this->getHandlerMock();
       // var_dump($handler instanceof \ashishittechnosoft\Demo\HandlerInterface);
        
        $handler2 = $this->getHandlerMock();
        $this->logger->registerHandler('memory',$handler);
        $this->logger->registerHandler('memory2',$handler2);
        $this->assertSame($handler, $this->logger->getHandler('memory'));
        $this->assertSame($handler2, $this->logger->getHandler('memory2'));
    }
    
    public function testPassingCallsToHandlers(){
        $mock = $this->getHandlerMock();
        $mock->expects($this->exactly(2))
             ->method('write')
             ->with(
                     $this->isType('integer'),
                     $this->equalTo('Hello!')
               ); 
             
        $this->logger->registerHandler('memory', $mock);
        $this->logger->registerHandler('memory2', $mock);
        $this->logger->log('Hello!','error');
        
    }

    public function getHandlerMock(){
        $mock = $this->getMock('\ashishittechnosoft\Demo\HandlerInterface');
        return $mock;
    }
}

