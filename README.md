# Linux Memory Information Class for PHP
==================

## Description
Using this PHP class you can query information about the system memory of your Linux server. This includes total amount of memory, free memory, active memory, cached memory, etc.

This class works by reading **/proc/meminfo** - a file available on Linux servers which contains information about the system memory. This information is sorted neatly in an array and output by the class.

## Example
### PHP Code:
```php
<?php

require __DIR__ . '/linuxMemoryInfo.class.php';
$m = new linuxMemoryInfo();

// All values this class returns are in kilobytes (kB).
print_r($m->getMemoryInfo());                         // (array)  Prints full memory information
echo $m->getMemoryInfo("MemTotal") . "\n";            // (int)    Prints the total amount of RAM
echo $m->getMemoryInfo("MemFree", true) . "\n";       // (string) Prints the amount of free RAM with a suffix kB

// To convert to megabytes (MB), you can divide the values by 1024.
// For a convenience you may also round the converted values.
echo round($m->getMemoryInfo("Active")/1024) . " MB"; // (int)    Prints the amount of active memory in megabytes

?>
```

### Sample Output:
```
Array
(
    [MemTotal] => 758088
    [MemFree] => 618984
    [Buffers] => 8304
    [Cached] => 94720
    [SwapCached] => 0
    [Active] => 61328
    [Inactive] => 62688
    [Active(anon)] => 21004
    [Inactive(anon)] => 152
    [Active(file)] => 40324
    [Inactive(file)] => 62536
    [Unevictable] => 0
    [Mlocked] => 0
    [HighTotal] => 0
    [HighFree] => 0
    [LowTotal] => 758088
    [LowFree] => 618984
    [SwapTotal] => 1447928
    [SwapFree] => 1447928
    [Dirty] => 4
    [Writeback] => 0
    [AnonPages] => 20992
    [Mapped] => 10928
    [Shmem] => 164
    [Slab] => 7672
    [SReclaimable] => 4724
    [SUnreclaim] => 2948
    [KernelStack] => 696
    [PageTables] => 988
    [NFS_Unstable] => 0
    [Bounce] => 0
    [WritebackTmp] => 0
    [CommitLimit] => 1826972
    [Committed_AS] => 120584
    [VmallocTotal] => 258104
    [VmallocUsed] => 7424
    [VmallocChunk] => 243344
    [HardwareCorrupted] => 0
    [HugePages_Total] => 0
    [HugePages_Free] => 0
    [HugePages_Rsvd] => 0
    [HugePages_Surp] => 0
    [Hugepagesize] => 4096
    [DirectMap4k] => 16320
    [DirectMap4M] => 753664
)
758088
618984 kB
60 MB
```