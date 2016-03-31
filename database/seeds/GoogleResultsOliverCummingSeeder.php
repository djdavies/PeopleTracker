<?php
/* 
	Test that I can access the serialized object values and the array values within nested objects.
*/

$file = file_get_contents("../../public/oliver_cumming_cardiff.json");

$jsonDe = json_decode($file);

$numResults = count($jsonDe->responseData->results);

echo $numResults;

for ($n = 0; $n < $numResults; $n++) {
		echo "URL: " . $jsonDe->responseData->results[$n]->url, "CONTENT: " . $jsonDe->responseData->results[$n]->content, "TITLE: " .$jsonDe->responseData->results[$n]->title;
}

echo $jsonDe->query;
echo $jsonDe->name;

?>