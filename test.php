<?php

$string = "<h1>Hello</h1>";
$clean_string = filter_var($string, FILTER_SANITIZE_STRING);

echo $clean_string;