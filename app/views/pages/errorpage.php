<?php

echo "<hr>";
echo "<h1>Error: " . $data['errormessage'] . "</h1>";
echo "<p>(view source for more info)</p>";
echo "<div style='display:none'>";
print_r($data);

print_r($_REQUEST);
echo "</div>";