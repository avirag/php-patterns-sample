<?php

// Factory and car interfaces
interface CarFactory {
  public function makeCar();
}

interface Car {
  public function getType();
}

// Concrete implementations of the factory and car
class Sedan implements Car {
  public function getType() {
    return 'Sedan';
  }
}

class SedanFactory implements CarFactory {
  public function makeCar() {
    return new Sedan();
  }
}

$factory = new SedanFactory();
$car = $factory->makeCar();
echo $car->getType();