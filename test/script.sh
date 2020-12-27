#!/bin/sh

./vendor/bin/phpcs --standard=phpcs.xml file.php | grep -q "FOUND 3 ERRORS AFFECTING 3 LINES"
./vendor/bin/phpcbf --standard=phpcs.xml file.php | grep -q "A TOTAL OF 3 ERRORS WERE FIXED IN 1 FILE"
