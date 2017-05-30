#!/usr/bin/php
<?php
	function my_getfiles($path, $rename = false)
	{
		global $list_files;
		global $root;
		$path .= '/';

		echo "\n\n=========================\nCHECKING : $path\n=========================\n\n";

	   	if (is_dir($path)) {
			if ($dh = opendir($path)) {
				while (($file = readdir($dh)) !== false) {
					if ($file == "." || $file == "..") continue;

					if (filetype($path . $file) == "dir")
					{
						my_getfiles($path . $file, true);
						continue;
					}

					if (!preg_match("/.[avi|mkv]$/", $file)) continue;

					if ($rename)
					{
						rename("$path$file", "$root/$file");
						$list_files[] = array($root.'/', $file);
						echo "-> Moved : $file\n";

					}
					else
						$list_files[] = array($path, $file);
				}
				closedir($dh);
			}
		}
		else
			echo "$path n'est pas un dossier";
	}

if ($argc < 2 || !is_dir($argv[1])) $argv[1] = ".";

$root = $argv[1];
$list_files = array();

$blacklist = array(
	"/\[.*\]/i",
	"/20\d{2}/i",
	"/truefrench/i",
	"/showfr/i",
	"/www/i",
	"/torrent9/i",
	"/notag/i",
	"/french/i",
	"/subforced/i",
	"/HDRip/i",
	"/aHDtv/i",
	"/HDtv/i",
	"/WEBRip/i",
	"/UNRATED/i",
	"/BaliBalo/i",
	"/HuSh/i",
	"/bdrip/i",
	"/brrip/i",
	"/dvdrip/i",
	"/x264/i",
	"/extreme/i",
	"/xvid/i",
	"/lost/i",
	"/stvfrv/i",
	"/RERip/i",
	"/funkky/i",
	"/svr/i",
	"/UTT/i",
	"/WEB/",
	"/LD/",
	"/T9/",
	"/AMZN/",
	"/DL/",
	"/ZT/",
	"/AC3/i",
	"/LibertylanD/i",
	"/multi/i",
	"/sph/i",
	"/LiBERTAD/i",
	"/WaNeZt/i",
	"/MD/",
	"/ReBoT/",
	"/NF/",
	"/biz/i"
);

my_getfiles($root);

echo "\n\n=========================\n LIST OF FILES \n=========================\n\n";

foreach ($list_files as $list_file) {
	$path_parts = pathinfo($list_file[0].$list_file[1]);
	$final_name = preg_replace($blacklist, "", $list_file[1]);
	$final_name = str_replace(".", " ", $final_name);
	$final_name = str_replace("-", " ", $final_name);
	$final_name = str_replace(" {$path_parts['extension']}", "", $final_name);
	$final_name = preg_replace("/[ \t\n\r]+/", " ", $final_name);

	$final_name = trim($final_name);
	printf("-> %70s => %40s\n", str_replace(".{$path_parts['extension']}", "", $list_file[1]), $final_name);
	rename($list_file[0].$list_file[1], "{$list_file[0]}$final_name.{$path_parts['extension']}");

}