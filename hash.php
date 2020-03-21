<?php
if (isset($argv[1]) and '' !== $argv[1]) {
    echo password_hash($argv[1], PASSWORD_DEFAULT) . PHP_EOL;
    exit(0);
}
echo 'Usage: ' . $argv[0] . ' [password]';
exit(1);

