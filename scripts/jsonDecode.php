<?php

$str = file_get_contents("data.json");
$json = json_decode($str, true); // decode the JSON into an associative array

// echo '<pre>' . print_r($json, true) . '</pre>';

$results = $json['responseData']['results'];

echo '<pre>' . print_r($results, true) . '</pre>';

$title = $json['responseData']['results'][0]['title'];

echo $title;

foreach($json['responseData']['results'] as $result){
print_r($result['title']);
}
?>

<html>
<head>
    <?php echo $debugbarRenderer->renderHead() ?>
</head>
<body>
    ...
    <?php echo $debugbarRenderer->render() ?>
</body>
</html>
