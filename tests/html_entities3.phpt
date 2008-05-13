--TEST--
HTML_Entities::decode tests
--FILE--
<?php
require_once "HTML/Entities.php";

$text = "HTML 2.0: &Aring;&AElig;&Ccedil;&Egrave;&Eacute;;&Ecirc;\n";
$text .= "HTML 3.2: &frac14;&frac12;&frac34;&iquest;&times;&divide;\n";
$text .= "HTML 4.0: &OElig;&oelig;&Scaron;&scaron;&Yuml;&fnof;&circ;&tilde;\n";
$text .= "XML: &apos;\n";
$text .= "Numerical: &#xe9; &#33; &#x03a6; &#x2295; &#x10000; &#0000000000045;";

echo HTML_Entities::decode($text);

?>
--EXPECT--        
HTML 2.0: ÅÆÇÈÉ;Ê
HTML 3.2: ¼½¾¿×÷
HTML 4.0: ŒœŠšŸƒˆ˜
XML: '
Numerical: é ! Φ ⊕ 𐀀 -
