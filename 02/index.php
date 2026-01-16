<?php
//make PHP strict
declare(strict_types = 1);
require_once "connect.php";

//1. Code Commenting

// inline comment

/*

multi-line comment

*/

//2. Variables, Data Types, Concatenation and Conditional Statements

$firstName = "Aaron"; //string
$lastName = "Khosrovaneh"; //string
$age = 18; //int
$isInstructor = false; //boolean

echo "<p> Hello there, my name is ". $firstName ." ". $lastName ."</p>";

if($isInstructor) {
    echo "<p> I am your teacher.</p>";
}
else {
    echo "<p> I am not your teacher.</p>";
}

//3. PHP is loosely typed

$num1 = 10; //integer
$num2 = "10"; //string


//add type hints
/*function add(int $num1, int $num2) : int {
    return $num1 + $num2;
}

echo "<p>" . add($num1, $num2) . "</p>";

*/

// OOP with PHP

class Person {
    public string $name;
    public int $age;
    public bool $isInstructor;

    public function __construct(string $name, int $age, bool $isInstructor) {
        $this->name = $name;
        $this->age = $age;
        $this->isInstructor = $isInstructor;
    }

    public function getBadge(): string {
        $role = $this->isInstructor ? "Instructor" : "Student";
        return "Name : {$this->name} | Age: {$this->age} | Role : $role";
    }
}

//Create an instance of the object

$person = new Person("Aaron", 18, false);

echo $person->getBadge();

//As I could use the connect.php and index.php files as a base for the lab, the coding itself was easy, and I practically faced no challeneges.
