<?php
class CircleQueue
{
  public $MAXSIZE;
  private $front;
  private $rear;
  private $count = 0;
  private $queue_array = [];

  public function __construct($MAXSIZE = 10)
  {
    $this->MAXSIZE = $MAXSIZE;
    $this->front = 0;
    $this->rear = $this->MAXSIZE - 1;
  }
  
  public function enqueue($element)
  {
    if ($this->count < $this->MAXSIZE) {
      $this->count++;
      $this->rear = ($this->rear + 1) % $this->MAXSIZE;
      $this->queue_array[$this->rear] = $element;
    } else {
      echo "The Queue is Full";
    }
  }

  public function dequeue()
  {
    if (!$this->isEmpty()) {
      $this->count--;
      unset($this->queue_array[$this->front]);
      $this->front = ($this->front + 1) % $this->MAXSIZE;
    } else {
      echo "The Queue Is Empty Can`t Delete Element";
    }
  }

  public function getfront()
  {
    if (!$this->isEmpty()) {
      return $this->queue_array[$this->front];
    } else {
      echo "The Queue Is Empty";
    }
  }

  public function getrear()
  {
    if (!$this->isEmpty()) {
      return $this->queue_array[$this->rear];
    } else {
      echo "The Queue Is Empty";
    }
  }

  public function isEmpty()
  {
    return $this->count == 0;
  }

  public function getQueue()
  {
    print_r($this->queue_array);
  }

  public function getNumberOfElement() 
  {
    return $this->count;
  }
}


$queue1 = new CircleQueue(5);

$queue1->enqueue(1);
$queue1->enqueue(2);
$queue1->enqueue(3);
$queue1->enqueue(4);
$queue1->enqueue(5);

$queue1->dequeue();

echo $queue1->getfront() . "<br>";
echo $queue1->getrear() . "<br>";




