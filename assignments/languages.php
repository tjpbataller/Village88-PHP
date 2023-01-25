<?php

$languages = array("PHP","JS","Ruby");
echo "<select>
<option>$languages[0]</option>
<option>$languages[1]</option>
<option>$languages[2]</option>
</select>
";
echo "<select>";

array_push($languages, "HTML");
array_push($languages, "CSS");

for($index = 0; $index < count($languages); $index++){
    echo "<option>{$languages[$index]}</option>";
}

echo "</select>";