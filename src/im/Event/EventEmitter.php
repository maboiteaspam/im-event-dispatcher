<?php
namespace im\Event;

trait EventEmitter {
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;
    public function on($event, $then, $p=0) {
        $this->dispatcher->addListener($event, $then, $p);
    }
    public function off($event, $then) {
        $this->dispatcher->removeListener($event, $then);
    }
    public function emit($name, $event=null) {
        if ($event!==null && !$event instanceof Event) {
            $event = new GenericEvent($name, $event);
        }
        $this->dispatcher->dispatch($name, $event);
    }
}