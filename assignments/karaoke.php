<?php
for($index=1;$index<50;$index++){
    $score = rand(1,100);
    echo "<h1>$score</h1>";
    if($score < 50){
        $message = "Never sing again, ever!";
    }else if($score < 80){
        $message = "Practice more!";
    }else if($score <95){
        $message = "You're getting better!";
    }else{
        $message = "What an excellent singer!";
    }
    echo "<h2>$message</h2>";
}
