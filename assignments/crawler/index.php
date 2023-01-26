<?php
    include("simple_html_dom.php");
    $html = file_get_html('https://www.bing.com/search?q=software+engineer&form=QBLH&sp=-1&pq=software+enginer&sc=10&qs=n&sk=&cvid=2F2C43C1EDBC4E6D88C117A7CB766CD5&ghsh=0&ghacc=0&ghpl=');

    $titles = array();

    foreach($html->find('h2>a') as $t){
        $titles[] = array("title"=>$t->innerTexT(),"link"=>$t->href);
    }
?>
<?php
    foreach($titles as $index=>$title){
        if($index>4){
            return;
        }
?>
<h1><?= $index+1?>) <?= $title["title"]?></h1>
<a href="<?=$title["link"]?>"><?=$title["link"]?></a><br>
<?php
    }
?>