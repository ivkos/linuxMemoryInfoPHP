<?php

require __DIR__ . '/linuxMemoryInfo.class.php';
$m = new linuxMemoryInfo();

// All values this class returns are in kilobytes (kB).
print_r($m->getMemoryInfo());                   // (array)  Prints full memory information
echo $m->getMemoryInfo("MemTotal") . "\n";      // (int)    Prints the total amount of RAM
echo $m->getMemoryInfo("MemFree", true) . "\n"; // (string) Prints the amount of free RAM with a suffix kB

// To convert to megabytes (MB), you can divide the values by 1024.
// For a convenience you may also round the converted values.
echo round($m->getMemoryInfo("Active")/1024);   // (int) Prints the amount of active memory in megabytes

?>
