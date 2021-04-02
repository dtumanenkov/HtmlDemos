<?php
$text="something random text in long line";

function random_uppercase($text_one){
    $words = explode(" ", $text_one);
    array_walk($words,function (&$val){
        if (rand(0,1)){
            $val = strtoupper($val);
        }
    });
    $result = implode(" ",$words);
    return $result;
}
print(random_uppercase($text).PHP_EOL);

class Student {
    private $lastName;
    private $firstName;
    private $thirdName;
    public $attributes=[];

    public function __construct($firstName,$lastName, $thirdName = null){
        if (empty($lastName)|| empty($firstName)){
            throw new InvalidArgumentException('Введите имя и фамилию!');
        }
    }

    public function getFullName(){
        return $this->lastName. ' '. $this->firstName;
    }

    public function rename($firstName,$lastName){
        $this -> firstName = $firstName;
        $this -> lastName = $lastName;
    }

    public function __get($name){
        return isset($this -> attributes[$name]) ? $this -> attributes[$name] : null;
    }
    public  function __set($name,$value){
        $this -> attributes[$name] = $value;
    }
    public  function __isset($name){
        return isset($this -> attributes[$name]);
    }
    public  function __unset($name){
        unset($this -> attributes[$name]);
    }
    public function __call($name, $params){
        return 'Call'. $name. ' '.print_r($params,true);
    }

}

$student=new Student('cull','yeah');

$student->rename ('Denis','Tumanenkov');
$student -> ccc = 11;

echo $student->getFullName().PHP_EOL;
echo print_r($student->attributes).PHP_EOL;
echo $student->move(123,12).PHP_EOL;