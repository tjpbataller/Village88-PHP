<?php
$success=0;
$fail=0;

echo "Practice starts...<br>";
for($index=1; $index<=1000; $index++){
    $rand = rand(0,1);
    if($rand == 1){
        $success++;
        $message="Success";
    }else{
        $fail++;
        $message="Epic Fail";
    }
    echo "<p>Attempt #$index: Shooting the ball... $message! ... Got {$success}x success and {$fail}x epic fail(s) so far</p>";
}
echo "Practice ended.";