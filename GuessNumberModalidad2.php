<?php

class GuessNumberModalidad2 extends GuessNumber {
    
    function __construct(int $min, int $max){
        parent::__construct($min, $max);
    }

    function generateNumber(){
        parent::setVal(rand(parent::getMin(), parent::getMax()));
    }

    function getUserValue(int $val){
        if(parent::getVal() == $val && parent::getStatus() != true) {
            parent::updateWin();
            return "Has acertat el numero!";
        } else if(parent::getVal() > $val) return "El numero es major";
        else if(parent::getVal() < $val) return "El numero es menor.";
        else return "Ja has guanyat aquesta partida!";
    }

}


?>