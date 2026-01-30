<?php
require "index.php";
declare(strict_types = 1);

// Define the Car class
class Car {
    // Properties to store car details
    public string $make;
    public string $model;
    public int $year;

    public function __construct(string $make, string $model, int $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Return the car's information
    public function getCarInfo(): string {
        return "Make : {$this->make} | Model: {$this->model} | Year : {$this->year}";
    }
}

$car = new Car("Volkswagen", "Beetle", 1960);
echo $car->getCarInfo();
