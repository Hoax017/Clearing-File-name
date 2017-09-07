# File-name-Cleaner

THIS TOOL USE PHP

## Launch clear name file
```bash
./clearfilename <directory>
```
EXEMPLE :
```bash
./clearfilename G:\Film
```
## Launch Sort Showtime on folders
```bash
./clearfilename -sort <directory>
```
### EXEMPLE :
```bash
./clearfilename -sort /home/Hoax017/Download
```
### Result:
```bash
╭─~/Clearing-File-name master✹ ◒  1h40m
╰─▶ ./clearfilename -sort /home/amaitre/Vidéos/A\ trier/
                       Gotham S01E11.avi ->             Gotham/S01/Gotham S01E11.avi
                       Gotham S01E12.avi ->             Gotham/S01/Gotham S01E12.avi
                    Supergirl S02E01.avi ->       Supergirl/S02/Supergirl S02E01.avi
                       Gotham S01E06.avi ->             Gotham/S01/Gotham S01E06.avi
                    Supergirl S01E19.avi ->       Supergirl/S01/Supergirl S01E19.avi
                       Gotham S01E01.avi ->             Gotham/S01/Gotham S01E01.avi
                    Supergirl S02E02.avi ->       Supergirl/S02/Supergirl S02E02.avi
                       Gotham S01E13.avi ->             Gotham/S01/Gotham S01E13.avi
              Supergirl S01E20 FiNAL.avi -> Supergirl/S01/Supergirl S01E20 FiNAL.avi
                       Gotham S01E02.avi ->             Gotham/S01/Gotham S01E02.avi
                       Gotham S01E04.avi ->             Gotham/S01/Gotham S01E04.avi
                       Gotham S01E03.avi ->             Gotham/S01/Gotham S01E03.avi
                       Gotham S01E05.avi ->             Gotham/S01/Gotham S01E05.avi
                       Gotham S01E07.avi ->             Gotham/S01/Gotham S01E07.avi
                       Gotham S01E15.avi ->             Gotham/S01/Gotham S01E15.avi
                       Gotham S01E09.avi ->             Gotham/S01/Gotham S01E09.avi
                       Gotham S01E10.avi ->             Gotham/S01/Gotham S01E10.avi
                       Gotham S01E08.avi ->             Gotham/S01/Gotham S01E08.avi
                       Gotham S01E14.avi ->             Gotham/S01/Gotham S01E14.avi
╭─~/Clearing-File-name master✹ ◒  1h40m
╰─▶ ls -lR /home/amaitre/Vidéos/A\ trier/
'/home/amaitre/Vidéos/A trier/':
total 8
drwxr-xr-x 3 amaitre users 4096  7 sept. 14:49 Gotham
drwxr-xr-x 4 amaitre users 4096  7 sept. 14:49 Supergirl

'/home/amaitre/Vidéos/A trier/Gotham':
total 4
drwxr-xr-x 2 amaitre users 4096  7 sept. 14:52 S01

'/home/amaitre/Vidéos/A trier/Gotham/S01':
total 5586544
-rw-r--r-- 1 amaitre users 579295232  7 sept. 13:17 'Gotham S01E01.avi'
-rw-r--r-- 1 amaitre users 367425536  7 sept. 13:23 'Gotham S01E02.avi'
-rw-r--r-- 1 amaitre users 367276032  7 sept. 13:29 'Gotham S01E03.avi'
-rw-r--r-- 1 amaitre users 367355918  7 sept. 13:36 'Gotham S01E04.avi'
-rw-r--r-- 1 amaitre users 367323136  7 sept. 13:43 'Gotham S01E05.avi'
-rw-r--r-- 1 amaitre users 367605763  7 sept. 13:49 'Gotham S01E06.avi'
-rw-r--r-- 1 amaitre users 367398912  7 sept. 13:58 'Gotham S01E07.avi'
-rw-r--r-- 1 amaitre users 367290368  7 sept. 14:04 'Gotham S01E08.avi'
-rw-r--r-- 1 amaitre users 367302656  7 sept. 14:10 'Gotham S01E09.avi'
-rw-r--r-- 1 amaitre users 367435776  7 sept. 14:17 'Gotham S01E10.avi'
-rw-r--r-- 1 amaitre users 367327232  7 sept. 14:23 'Gotham S01E11.avi'
-rw-r--r-- 1 amaitre users 367230976  7 sept. 14:30 'Gotham S01E12.avi'
-rw-r--r-- 1 amaitre users 365353218  7 sept. 14:36 'Gotham S01E13.avi'
-rw-r--r-- 1 amaitre users 367272102  7 sept. 14:43 'Gotham S01E14.avi'
-rw-r--r-- 1 amaitre users 367462400  7 sept. 14:49 'Gotham S01E15.avi'

'/home/amaitre/Vidéos/A trier/Supergirl':
total 8
drwxr-xr-x 2 amaitre users 4096  7 sept. 14:52 S01
drwxr-xr-x 2 amaitre users 4096  7 sept. 14:52 S02

'/home/amaitre/Vidéos/A trier/Supergirl/S01':
total 695952
-rw-r--r-- 1 amaitre users 358414942  7 sept. 12:44 'Supergirl S01E19.avi'
-rw-r--r-- 1 amaitre users 354208204  7 sept. 12:48 'Supergirl S01E20 FiNAL.avi'

'/home/amaitre/Vidéos/A trier/Supergirl/S02':
total 717560
-rw-r--r-- 1 amaitre users 367487962  7 sept. 12:59 'Supergirl S02E01.avi'
-rw-r--r-- 1 amaitre users 367253330  7 sept. 13:08 'Supergirl S02E02.avi'
```
## Config
If no directory selected it select directory form config.json
```JSON
{
    "default_folder": "\/home\/Hoax017\/Download"
}
```

<img src="https://raw.githubusercontent.com/Hoax017/Clearing-File-name/master/ScreenShot.png">