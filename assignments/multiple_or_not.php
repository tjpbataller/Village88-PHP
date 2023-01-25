<?php

for($index=1; $index<=1000; $index++){
    if($index%3 == 0){
        echo "$index => Multiple<br>";
        continue;
    }
    echo "$index => Not multiple<br>";
}