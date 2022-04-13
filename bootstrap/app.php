<?php

assert_options(ASSERT_BAIL, true);

foreach([ 'lib', 'services' ] as $dir){
    $includePath = dirname(__DIR__) . "/app/{$dir}/";
    foreach(scandir($includePath) as $file){
        if(fnmatch('*.php', $file)){
            require_once $includePath . $file;
        }
    }
}

$providers = [
    'error',
    'database',
    'session',
    'middleware',
    'route'
];
foreach($providers as $file){
    require_once dirname(__DIR__) . "/app/providers/{$file}.php";
}
