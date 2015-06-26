<?php
$result = array();
if (($handle = fopen("file.csv", "r")) !== FALSE) {
    $column_headers = fgetcsv($handle); // read the headers.
    foreach($column_headers as $header) {
            $result[$header] = array();
    }

    while (($data = fgetcsv($handle)) !== FALSE) {
        $i = 0;
        foreach($result as &$column) {

                $column[] = $data[$i++];
        }

    }
    fclose($handle);
}

//$json = json_encode($result);

$row_count = count($result["role"]);
for($i=0; $i<$row_count; $i++) {
	foreach($result as $data){
		echo $data[$i];
	}
}
?>
