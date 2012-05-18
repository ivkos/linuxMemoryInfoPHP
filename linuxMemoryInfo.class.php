<?php

/*
 * Class written by ivkos
 *
 * GitHub: https://github.com/ivkos/linuxMemoryInfoPHP
 */

class linuxMemoryInfo
{
    public function getMemoryInfo($property = null, $preserveSuffix = false)
    {
        $rawData    = explode("\n", trim(file_get_contents('/proc/meminfo')));
        $memoryInfo = array();
        
        foreach ($rawData as $line) {
            list($key, $value) = explode(":", $line);
            if ($preserveSuffix) {
                $memoryInfo[$key] = trim($value);
            } else {
                $memoryInfo[$key] = trim(str_replace('kB', '', $value));
            }
        }
        
        return isset($property) ? $memoryInfo[$property] : $memoryInfo;
    }
}