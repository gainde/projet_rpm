<?php

/*
 * Simuler le import de java
 * param : $import (ex. "com.org.java.core.test" ou "com.org.java.core.*")
 */
function import($import) {

// if this import has already happened, don't bother,
    if (isset($_imports[$import]))
        return true;

// seperate import into a package and a class
    $lastDot = strrpos($import, '.');
    $class = $lastDot ? substr($import, $lastDot + 1) : $import;
    $package = substr($_import, 0, $lastDot);

// create a folder path out of the package name
    $folder = '' . ($package ? str_replace('.', '/', $package) : '');
    $file = "$folder/$class.php";

    if ($class != '*') {
// add the class and it's file location to the imports array

        include_once($file);
    } else {
// add all the classes from this package and their file location to the imports array
// first log the fact that this whole package was alread imported
        $_imports["$package.*"] = 1;
        $dir = opendir($folder);
        while (($file = readdir($dir)) !== false) {
            if (strrpos($file, '.php')) {
                include_once("$folder/$file");
            }
        }
    }

    $_imports[$import] = $import;
}
