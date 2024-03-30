<?php

echo 'Hello world';

echo '<pre>';
print_r($_SERVER['REQUEST_URI']);
echo '</pre>';

echo '<pre>';
print_r($_SERVER['QUERY_STRING']);
echo '</pre>';

echo '<pre>';
print_r($_GET);
echo '</pre>';
