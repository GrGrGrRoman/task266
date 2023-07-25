<?php

$src = 'start.html';

require_once 'Cuter.php';

if (file_exists('finish.html')) {
    unlink('finish.html');
}
$arr = preg_split("/(\r\n|\n|\r)/", file_get_contents($src));

$html = new Cuter($arr);

foreach ($html as $key => $value) {
    file_put_contents('finish.html', $value . PHP_EOL, FILE_APPEND);
}