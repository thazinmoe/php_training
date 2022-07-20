<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 05</title>
    <link href="css/reset.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <h2>Testing text file</h2><br>
    <?php
    $file = "./document.txt";
    $document = file_get_contents($file);
    $lines = explode("\n", $document);
    foreach ($lines as $newline) {
        echo '<b>' . $newline . '</b><br>';
    }
    ?>
    <hr>
    <h2>Testing excel file</h2><br>
    <table>
        <?php
        require "vendor/autoload.php";
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('sample.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            // (B1) READ CELLS
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            // (B2) OUTPUT HTML
            echo "<tr>";
            foreach ($cellIterator as $cell) {
                echo "<td>" . $cell->getValue() . "</td>";
            }
            echo "</tr>";
        }

        ?>
    </table>
    <hr>
    <h2>Testing CSV file</h2><br>
    <?php
    echo '<table>';
    $start_row = 1;
    if (($csv_file = fopen("document.csv", "r")) !== FALSE) {
        while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
            $column_count = count($read_data);
            echo '<tr>';
            $start_row++;
            for ($c = 0; $c < $column_count; $c++) {
                echo "<td>" . $read_data[$c] . "</td>";
            }
            echo '</tr>';
        }
        fclose($csv_file);
    }
    echo '</table>';
    ?>
    <hr>
    <h2>Testing Doc file</h2><br>
    <div>
        <?php
        require 'vendor/autoload.php';
        error_reporting(E_ALL ^ E_DEPRECATED);
        $dir = str_replace('\\', '/', __DIR__) . '/';
        $source = $dir . 'sample.doc';
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    foreach ($element->getElements() as $e) {
                        if ($e instanceof \PhpOffice\PhpWord\Element\Text) {
                            $style = $e->getFontStyle();
                            $size = $style->getSize();
                            $color = $style->getColor();
                            echo '<p style="font-size:' . $size . 'px; color: #' . $color . '">'
                                . $e->getText() . '</p>';
                        }
                    }
                }
            }
        }
        ?>
    </div>

</body>

</html>