# video_store_lab
CSV storage assignment for PHP 239

PHP version: 8.2.4

## Part 1 - creating the form and uploading the CSV file
1. Create an index.php and a file upload form
2. Use action="upload.php" method="post" enctype="multipart/form-data"

## Part 2 — Includes & Functions
Goal
Create includes/functions.php and define these helpers (signatures only here).

    esc_html(string $text): string — escape text for safe HTML output.
    read_csv_rows(string $path): array — read all rows from a CSV file and return them as numeric arrays.
    write_csv_rows(string $path, array $rows): bool — write an array of rows to a CSV file (returns true on success).

Where used: upload.php should call write_csv_rows(...) after a successful upload. view.php should call read_csv_rows(...) to display the table.

## Part 3 — Save the Uploaded File
Goal
Move the uploaded file from PHP’s temp location into data/games.csv, then write/replace contents using write_csv_rows() as needed.

    Create upload.php. Read the file info from $_FILES['datafile'].
    Make sure a data/ folder exists. If not, create it with permissions 0755.
    Build a destination path using the magic constant:
    $destDir = __DIR__ . '/data'; $destFile = $destDir . '/games.csv';
    Move the uploaded file using move_uploaded_file($_FILES['datafile']['tmp_name'], $destFile).
    Call write_csv_rows($destFile, $rows) to persist it.
    On success, print a short confirmation and a link to view the data (e.g., view.php).

## Part 4 — Display the CSV
Goal
Read data/games.csv and display each row in an HTML table.

    Create view.php. At the top, require your functions file and read the data:
    Render a table with headings that match your CSV columns (numeric rows, no header). 
    <table border="1" cellpadding="6"> <tr> <th>Game ID</th> <th>Title</th> <th>Console</th> <th>Price</th> <th>Image</th> </tr> 
    .... <tr> <td><?= esc_html($row[0] ?? '') ?></td> .....
