<?php 

namespace ashishittechnosoft\Demo;

class Logger{
    protected $handler;
    
    public function registerHandler($name, $handler){
        $this->handler[$name] = $handler; 
    }
    
    public function getHandler($name){
        return $this->handler[$name];
    }
}