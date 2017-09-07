#!/usr/bin/php
<?php
/**
 * Description
 *
 * @param  string $path
 * @param  bool   $move
 * @return array
 */
function My_getfiles($path, $move = false)
{
    $list_files = array();
    global $root;
    $path .= '/';

    echo "\n\n======================\nCHECKING : $path\n=======================\n\n";

    if (is_dir($path)) {
        if ($dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file == "." || $file == "..") {
                    continue;
                }

                if (filetype($path . $file) == "dir") {
                    $list_files = array_merge(
                        $list_files,
                        My_getfiles($path . $file, true)
                    );
                    continue;
                }

                if (!preg_match("/[avi|mkv|mp4]$/", $file)) {
                    continue;
                }

                if ($move) {
                    rename("$path$file", "$root/$file");
                    $list_files[] = array($root.'/', $file);
                    echo "-> Moved : $file\n";

                } else {
                    $list_files[] = array($path, $file);
                }
            }
            closedir($dh);
        }
    } else {
        echo "$path n'est pas un dossier";
    }
    return $list_files;
}

$config = json_decode(file_get_contents(__DIR__."/../config.json"));

if ($argc < 2 || empty($argv[1]) || !is_dir($argv[1])) {
    $argv[1] = $config->default_folder;
}

$root = $argv[1];

$blacklist = $config->blacklist;


$list_files = My_getfiles($root);

echo "\n\n=========================\n LIST OF FILES \n=========================\n\n";

foreach ($list_files as $list_file) {
    $path_parts = pathinfo($list_file[0].$list_file[1]);
    $final_name = preg_replace($blacklist, "", $list_file[1]);
    $final_name = str_replace(".", " ", $final_name);
    $final_name = str_replace("-", " ", $final_name);
    $final_name = str_replace(" {$path_parts['extension']}", "", $final_name);
    $final_name = preg_replace("/[ \t\n\r]+/", " ", $final_name);
    $final_name = ucwords(strtolower($final_name));

    if (preg_match("/(S\d{2}E\d{2})/i", $final_name, $match)) {
        $final_name = str_replace($match[1], strtoupper($match[1]), $final_name);
    }

    $final_name = trim($final_name);
    printf(
        "-> %70s => %40s\n",
        str_replace(".{$path_parts['extension']}", "", $list_file[1]),
        $final_name
    );
    rename(
        $list_file[0].$list_file[1],
        "{$list_file[0]}$final_name.{$path_parts['extension']}"
    );

}