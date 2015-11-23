<?php

/**
 * base class Animal
 *
 */
class Animal { 
    public $serialNumber;
    
    /**
     * public method recieves maximum and minum number and generates $count number of serial numbers without these limits
     */
    public function SetSerialNumbers($min, $max, $count) {

        $range = array();
        $i=0;
                while($i < $count){
                        //generating a random number
                        while(in_array($serialNumber = mt_rand($min, $max), $range)){}
                        //checking if the number is prime
                        if ($this->IsPrime($serialNumber)) {
                                $range[] = $serialNumber;
                                $i++;
                        }
                }
        return $range;
    }
    
    /**
     * public method recieves file name and data and saves data to that file
     */
    public function SaveToFile($filename, $data) {
            file_put_contents($filename, $data);
    }
    
    /**
     * private method recieves number to check if its a prime number
     */
    private function IsPrime($number)
    {
            // 1 is not prime
            if ( $number == 1 ) {
                    return false;
            }
            // 2 is the only even prime number
            if ( $number == 2 ) {
                    return true;
            }
            // square root algorithm speeds up testing of bigger prime numbers
            $x = sqrt($number);
            $x = floor($x);
            for ( $i = 2 ; $i <= $x ; ++$i ) {
                    if ( $number % $i == 0 ) {
                            break;
                    }
            }
    
            if( $x == $i-1 ) {
                    return true;
            } else {
                    return false;
            }
    }
} 

class Goat extends Animal {
    function __construct($min, $max, $count) { 
        $this->SetSerialNumbers($min, $max, $count); 
    } 
}

class Sheep extends Animal {
    function __construct($min, $max, $count) { 
        $this->SetSerialNumbers($min, $max, $count); 
    } 
}

?>