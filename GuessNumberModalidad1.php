<?php

class GuessNumberModalidad1 extends GuessNumber {

    function __construct(int $min, int $max){
        parent::__construct($min, $max);
    }

    function guessType($operator){
        if(parent::getStatus() != true){
            if(!$operator){
                parent::setVal($this->guessNumber( parent::getMin(), parent::getMax() ));
            } else {
                if($operator == "+"){
                    parent::setMin(parent::getVal());
    
                    if($this->guessNumber(parent::getMin(), parent::getMax()) == parent::getVal()) {
                        parent::setVal(parent::getMin() + 1);
                        parent::updateWin();
                    }
                    else parent::setVal($this->guessNumber( parent::getMin(), parent::getMax()) );
                    
                } elseif($operator == "-") {
                    parent::setMax(parent::getVal()); 
                    parent::setVal($this->guessNumber( parent::getMin(), parent::getMax() ));
                } else {
                    parent::updateWin();
                }
            }
        }
    }

    function guessNumber(int $min, int $max){
        return floor((($max - $min) / 2) + $min);
    }

}


?>