#!/bin/sh

./vendor/bin/phpcs --standard=test/phpcs.xml test/file.php | grep -q "FOUND 3 ERRORS AFFECTING 30 LINES"
./vendor/bin/phpcbf --standard=test/phpcs.xml test/file.php | grep -q "A TOTAL OF 3 ERRORS WERE FIXED IN 1 FILE"
