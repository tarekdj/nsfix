# nsfix [![Build Status](https://travis-ci.com/tarekdj/nsfix.svg?branch=main)](https://travis-ci.com/tarekdj/nsfix)

This is a phpcs sniff that finds a set of namespaces and replace it by new ones.

## Installation

```
composer require tarekdj/nsfix --dev 
```

## Usage

Create a ruleset file with the following content (Don't forget to set old and new namespaces)

```xml
<?xml version="1.0"?>
<ruleset name="ReplaceNamespaces">
    <rule ref="./vendor/tarekdj/nsfix/Sniffs/Namespaces/DisallowOldNamesapceSniff.php">
        <properties>
            <property name="nameSpacesMapping" type="array">
                <element key="OLD_NAMESPACE" value="NEW_NAMESPACE"/>
                <element key="ANOTHER_OLD_NAMESPACE" value="ANOTHER_NEW_NAMESPACE"/>
            </property>
        </properties>
    </rule>
</ruleset>

```

### Run phpcs

```
./vendor/bin/phpcs --standard=PATH/TO/RULESET.xml PATH/TO/SRC 
```

### Run phpcbf

```
./vendor/bin/phpcbf --standard=PATH/TO/RULESET.xml PATH/TO/SRC 
```

