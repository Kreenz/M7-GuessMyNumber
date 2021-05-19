<?php 

class GuessNumber {

    private $min;
    private $max;
    private $nivell;
    private $val;
    private $tries;
    private $win;
    private $victory;

    function __construct(int $min, int $max) {
        $this->min = $min;
        $this->max = $max;
        $this->nivell = $max;
        $this->val = 0;
        $this->win = 0;
        $this->tries = 0;
        $this->victory = false;
        $this->updateTries();
    }

    function newGame(int $min, int $max){
        $this->min = $min;
        $this->max = $max;
        $this->victory = false;
    }

    function setMin(int $min){
        $this->min = $min;
    }

    function setMax(int $max){
        $this->max = $max;
    }

    function setVal(int $val){
        $this->val = $val;
    }

    function getMin(){
        return $this->min;
    }

    function getMax(){
        return $this->max;
    }

    function getNivell(){
        return $this->nivell;
    }

    function getVal(){
        return $this->val;
    }

    function getWins(){
        return $this->win;
    }

    function getTries(){
        return $this->tries;
    }

    function getStatus(){
        return $this->victory;
    }

    function updateWin(){
        $this->win++;
        $this->victory = true;
    }

    function updateTries(){
        $this->tries++;
    }
}   

?>