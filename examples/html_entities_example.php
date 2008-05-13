<html>
<head><title>HTML_Entities example</title></head>
<body>
<?php

error_reporting(E_STRICT);
ini_set('display_errors', true);

require_once "HTML/Entities.php";

// 1. Define a text (utf8) we want to convert to entities:
$t = "Le français est une langue qui nécessite des caractères spéciaux.";

// 2. Convert it to HTML entities:
$t = HTML_Entities::encode($t);
echo "<p>".$t."</p>";

// 3. Convert it back to latin1:
try {
$t = HTML_Entities::decode($t, HTML_Entities::ALL, "latin1");
}
catch (PEAR_Exception $e) {
var_dump($e);
}
echo "<p>".$t."</p>";

// 4. Write the list of entities

echo "<table>";
$table = HTML_Entities::getTranslationTable();
foreach ($table as $char=>$entity) {
	echo "<tr><td>{$char}</td><td>";
	echo HTML_Entities::encode($entity);
	echo "</td></tr>";
}
echo "</table>";

?>
</body></html>

