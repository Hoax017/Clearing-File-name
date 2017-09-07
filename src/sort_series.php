#!/usr/bin/php
<?php
$config = json_decode(file_get_contents(__DIR__."/config.json"));


if ($argc < 2 || empty($argv[1]) || !is_dir($argv[1])) {
    $argv[1] = $config->default_folder;
}

$path = $argv[1];

echo "\n\n======================\nSort Showtime : $path\n======================\n\n";


if (is_dir($path)) {
    if ($dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file == "."
                || $file == ".."
                || !preg_match("/(S\d{2})E\d{2}/", $file, $match)
            ) {
                continue;
            }

            $path_parts = pathinfo($file);
            $serie_name = str_replace($match[0], "", $path_parts["filename"]);
            $serie_name = preg_replace("/\s*\-?\s*final$/i", "", $serie_name);
            $serie_name = preg_replace("/\d+p/i", "", $serie_name);
            $serie_name = preg_replace("/vostfr/i", "", $serie_name);
            $serie_name = trim($serie_name);
            if (!is_dir("$path/$serie_name")) {
                mkdir("$path/$serie_name");
            }
            if (!is_dir("$path/$serie_name/{$match[1]}")) {
                mkdir("$path/$serie_name/{$match[1]}");
            }
            rename("$path/$file", "$path/$serie_name/{$match[1]}/$file");
            printf("%40s -> %40s\n", $file, "$serie_name/{$match[1]}/$file");
        }
    }
}
