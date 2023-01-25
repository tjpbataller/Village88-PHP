<?php
    header('content-type: text/css');
?>
p{
    font-size: <?= rand(14,32)."px"?>;
    color: rgb(<?= rand(1,255)?>, <?= rand(1,255) ?>,<?= rand(1,255) ?>);
}
em{
    font-size: <?= rand(14,32)."px"?>;
    color: rgb(<?= rand(1,255) ?>,<?= rand(1,255) ?>,<?= rand(1,255) ?>);
    display: block;
}