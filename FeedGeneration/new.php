<?php
$csv = "League,Team,Date,Opponent,Result\namerican,MIN,May 3,UTA,W\namerican,MIN,May 4,SEA,L\namerican,SAC,May 3,DAL,L\namerican,SAC,May 4,TOR,W\nnational,NYN,May 5,BAL,L\nnational,NYN,May 7,MIA,W\nnational,DET,May 6,DEN,L\nnational,DET,May 7,POR,L";
$csv_array = explode("\n", $csv);
$tables = [];
foreach($csv_array as $key => $value) {
    if ($key == 0) {
        continue;
    }
    $line = explode(',', $value);
    if (array_key_exists($line[1], $tables)) {
        $tables[$line[1]][] = $line;
    } else {
        $tables[$line[1]] = [$line];
    }
}

foreach ($tables as $key => $value) {
    echo '<h1> ' .$key. ' </h1>'; // YOUR TITLE (Team)
    echo "<table>";
    echo '<tr>';
    foreach (explode(',', $csv_array[0]) as $keyHeader => $valueHeader) {
        if (in_array($keyHeader, [0, 1])) {
            continue;
        }
        echo "<th>$valueHeader</th>";
    }
    echo '</tr>';
    foreach ($value as $keyRow => $valueRow) {
        echo '<tr>';
            foreach ($valueRow as $keyValue => $valueValue) {
                if (in_array($keyValue, [0, 1])) {
                    continue;
                }
                echo "<td>$valueValue</td>";
            }
        echo '</tr>';
    }
    echo '</table>';
?>