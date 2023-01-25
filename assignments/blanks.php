<?php
$list = array(4,"Michael",3,"Karen",2,"Rogie");

function convert_to_blanks($arr){
    foreach($arr as $blank){
        if(is_numeric($blank)){
            for($index=0; $index<$blank; $index++){
                echo "_ ";
            }
        }else{
            echo "$blank[0] ";
            for($index=1; $index<strlen($blank); $index++){
                echo "_ ";
            }
        }
        echo "<br>";
    }
}

convert_to_blanks($list);