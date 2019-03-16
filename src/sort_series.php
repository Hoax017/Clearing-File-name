#!/usr/bin/php
<?php
$config = json_decode(file_get_contents(__DIR__."/../config.json"));
if (empty($config)) {
	die("Config error");
}

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
				|| is_dir($file)
				|| !preg_match($config->match, $file)
				|| !preg_match("/(.*)(S\d+)E\d+/i", $file, $match)
			) {
				continue;
			}

			$path_parts = pathinfo($file);
			$serie_name = $match[1];
			$serie_name = preg_replace("/\s*\-?\s*final(\s*\d+p)?$/i", "$1", $serie_name);
			$serie_name = preg_replace("/\d+p/i", "", $serie_name);
			$serie_name = preg_replace("/vostfr/i", "", $serie_name);
			$serie_name = trim($serie_name);
			if (!is_dir("$path/$serie_name")) {
				mkdir("$path/$serie_name");
			}
			if (!is_dir("$path/$serie_name/{$match[2]}")) {
				mkdir("$path/$serie_name/{$match[2]}");
			}
			rename("$path/$file", "$path/$serie_name/{$match[2]}/$file");
			printf("%40s -> %40s\n", $file, "$serie_name/{$match[2]}/$file");
		}
	}
}
