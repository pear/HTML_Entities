--TEST--
HTML_Entities::encode tests
--FILE--
<?php
require_once "HTML/Entities.php";

$text = "HTML special chars: <>\"'&. \n";
$text .= "HTML 2.0 chars: ÀÈÌÒÙàèìòù. \n";
$text .= "HTML 3.2 chars: © ¡ £ ×. \n";
$text .= "HTML 4.0 chars: Œ œ Δ ‡ ♠♣♥♦. \n";
$text .= "-----------------------------------------\n";

echo "UTF8:\n";
echo $text;
echo "HTML 2.0:\n";
echo HTML_Entities::encode($text, HTML_Entities::NAMES, HTML_Entities::HTML20);
echo "HTML 3.2:\n";
echo HTML_Entities::encode($text, HTML_Entities::NAMES, HTML_Entities::HTML32);
echo "HTML 4.0:\n";
echo HTML_Entities::encode($text, HTML_Entities::NAMES, HTML_Entities::HTML40);
echo "XHTML 1.0:\n";
echo HTML_Entities::encode($text, HTML_Entities::NAMES, HTML_Entities::XHTML10);
echo "XML:\n";
echo HTML_Entities::encode($text, HTML_Entities::NAMES, HTML_Entities::XML);
echo "Ignore special chars:\n";
echo HTML_Entities::encode('<p>'.$text.'</p>',
	HTML_Entities::NAMES,
	HTML_Entities::HTML40 | HTML_Entities::IGNORE_SPECIAL_CHARS);
echo "Numerical entities:\n";
echo HTML_Entities::encode($text, HTML_Entities::CODES);
echo "HTML 2.0 + numerical:\n";
echo HTML_Entities::encode($text, HTML_Entities::NAMES | HTML_Entities::CODES,
	HTML_Entities::HTML20);
?>
--EXPECT--
UTF8:
HTML special chars: <>"'&. 
HTML 2.0 chars: ÀÈÌÒÙàèìòù. 
HTML 3.2 chars: © ¡ £ ×. 
HTML 4.0 chars: Œ œ Δ ‡ ♠♣♥♦. 
-----------------------------------------
HTML 2.0:
HTML special chars: &lt;&gt;&quot;'&amp;. 
HTML 2.0 chars: &Agrave;&Egrave;&Igrave;&Ograve;&Ugrave;&agrave;&egrave;&igrave;&ograve;&ugrave;. 
HTML 3.2 chars: © ¡ £ ×. 
HTML 4.0 chars: Œ œ Δ ‡ ♠♣♥♦. 
-----------------------------------------
HTML 3.2:
HTML special chars: &lt;&gt;&quot;'&amp;. 
HTML 2.0 chars: &Agrave;&Egrave;&Igrave;&Ograve;&Ugrave;&agrave;&egrave;&igrave;&ograve;&ugrave;. 
HTML 3.2 chars: &copy; &iexcl; &pound; &times;. 
HTML 4.0 chars: Œ œ Δ ‡ ♠♣♥♦. 
-----------------------------------------
HTML 4.0:
HTML special chars: &lt;&gt;&quot;'&amp;. 
HTML 2.0 chars: &Agrave;&Egrave;&Igrave;&Ograve;&Ugrave;&agrave;&egrave;&igrave;&ograve;&ugrave;. 
HTML 3.2 chars: &copy; &iexcl; &pound; &times;. 
HTML 4.0 chars: &OElig; &oelig; &Delta; &Dagger; &spades;&clubs;&hearts;&diams;. 
-----------------------------------------
XHTML 1.0:
HTML special chars: &lt;&gt;&quot;&apos;&amp;. 
HTML 2.0 chars: &Agrave;&Egrave;&Igrave;&Ograve;&Ugrave;&agrave;&egrave;&igrave;&ograve;&ugrave;. 
HTML 3.2 chars: &copy; &iexcl; &pound; &times;. 
HTML 4.0 chars: &OElig; &oelig; &Delta; &Dagger; &spades;&clubs;&hearts;&diams;. 
-----------------------------------------
XML:
HTML special chars: &lt;&gt;&quot;&apos;&amp;. 
HTML 2.0 chars: ÀÈÌÒÙàèìòù. 
HTML 3.2 chars: © ¡ £ ×. 
HTML 4.0 chars: Œ œ Δ ‡ ♠♣♥♦. 
-----------------------------------------
Ignore special chars:
<p>HTML special chars: <>"'&. 
HTML 2.0 chars: &Agrave;&Egrave;&Igrave;&Ograve;&Ugrave;&agrave;&egrave;&igrave;&ograve;&ugrave;. 
HTML 3.2 chars: &copy; &iexcl; &pound; &times;. 
HTML 4.0 chars: &OElig; &oelig; &Delta; &Dagger; &spades;&clubs;&hearts;&diams;. 
-----------------------------------------
</p>Numerical entities:
HTML special chars: &#x003c;&#x003e;&#x0022;&#x0027;&#x0026;. 
HTML 2.0 chars: &#x00c0;&#x00c8;&#x00cc;&#x00d2;&#x00d9;&#x00e0;&#x00e8;&#x00ec;&#x00f2;&#x00f9;. 
HTML 3.2 chars: &#x00a9; &#x00a1; &#x00a3; &#x00d7;. 
HTML 4.0 chars: &#x0152; &#x0153; &#x0394; &#x2021; &#x2660;&#x2663;&#x2665;&#x2666;. 
-----------------------------------------
HTML 2.0 + numerical:
HTML special chars: &lt;&gt;&quot;&#x0027;&amp;. 
HTML 2.0 chars: &Agrave;&Egrave;&Igrave;&Ograve;&Ugrave;&agrave;&egrave;&igrave;&ograve;&ugrave;. 
HTML 3.2 chars: &#x00a9; &#x00a1; &#x00a3; &#x00d7;. 
HTML 4.0 chars: &#x0152; &#x0153; &#x0394; &#x2021; &#x2660;&#x2663;&#x2665;&#x2666;. 
-----------------------------------------
