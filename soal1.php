<!-- soal 1 -->
<?php
$jml = $_GET['jml']; 
echo "<table border=1>\n"; 

for ($a = $jml; $a > 0; $a--) {
    $rowTotal = 0; 

    for ($b = $a; $b > 0; $b--) {
        $rowTotal += $b;
    }

    echo "<tr><td colspan='$jml'>TOTAL: $rowTotal</td></tr>\n";

    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}

echo "</table>";
?>