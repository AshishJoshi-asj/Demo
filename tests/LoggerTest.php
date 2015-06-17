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
        $handler = new stdClass();
        $this->logger->registerHandler('memory',$handler);
        $this->assertSame($handler, $this->logger->getHandler('memory'));
    }
    
    public function testRegistersMoreThanOneHandlerCorrectly(){
        $handler = new stdClass();
        $handler2 = new stdClass();
        $this->logger->registerHandler('memory',$handler);
        $this->logger->registerHandler('memory2',$handler2);
        $this->assertSame($handler, $this->logger->getHandler('memory'));
        $this->assertSame($handler2, $this->logger->getHandler('memory2'));
    }
}

