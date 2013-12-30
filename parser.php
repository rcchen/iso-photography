<?

$str = file_get_contents('sample.json');
$json = json_decode($str);

print_r($json);

?>