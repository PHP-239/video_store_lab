<?php
/**Games Store Lab
  Carlie Peters
  **/

  //escaping html special characters
  function esc_html(string $text) : string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
  }

  //reading rows from a CSV file
  function read_csv_rows(string $path): array {
      
      $filename = "games.csv";
        $csvPath = __DIR__ . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . $filename;
    //checok if file exists
    if(!file_exists($csvPath)){
        die("File not found: $filename");
    }
    //open the file for reading
    $file = fopen($csvPath, 'rb');
    $games = array();

    while(!feof($file)){
        //Read a line from the file and parse for CSV fields
        $game = fgetcsv($file);
        //if the line is false(usually end of file or there's an error) then skip it this iteration of the loop
        if($game === false){
            continue;
        }
        //add CSV row to data array
        $games[] = $game;
    }
    fclose($file);
    return $games;
  }

  //writing rows to a CSV file
  function write_csv_rows(string $path, array $rows): bool {
    $file = fopen($path, 'wb');
    if($file === false){
        return false;
    }
    foreach($rows as $row){
        fputcsv($file, $row);
    }
    fclose($file);
    return true;
  }

?>