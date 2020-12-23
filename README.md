# ReplaceNamespace

This is a custom phpcs sniff that finds "Novactive" namespace and replace it by the new one.

## How to use

* Clone this repo
* Edit ``DisallowOldNamesapceSniff.php`` and changes the values in lines 11 & 12
* Execute the following command in your project:

``phpcs --standard=PATH/TO/AlmaviaStandard /path/TO/SRC``

or

``phpcbf --standard=PATH/TO/AlmaviaStandard /path/TO/SRC``
