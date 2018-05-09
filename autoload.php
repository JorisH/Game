<?php
$map = [
    'Game\\' => 'src' . DIRECTORY_SEPARATOR . 'Game',
    'Log\\' => 'src' . DIRECTORY_SEPARATOR . 'Log'
];

spl_autoload_register(function ($fqClassName) use ($map) {
    $namespaceMatch = '';
    if (preg_match('/^.*\\\\/', $fqClassName, $namespaceMatch) !== 1) {
        throw new UnexpectedValueException(sprintf('Unable to autoload %s.', $fqClassName));
    };
    $namespace = $namespaceMatch[0]; //Game\Strategy\
    
    $required = false;
    foreach ($map as $nsPrefix => $rootDir) {
        if (strpos($namespace, $nsPrefix) !== 0) continue;
        
        $subNs = substr($namespace, strlen($nsPrefix));
        $subDirs = str_replace('\\', DIRECTORY_SEPARATOR, trim($subNs, '\\'));
        $className = substr($fqClassName, strlen($namespace));
        
        require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.$rootDir.DIRECTORY_SEPARATOR.$subDirs.DIRECTORY_SEPARATOR.$className.'.php');
        $required = true;
        break;
    }
    
    if (!$required) {
        throw new UnexpectedValueException(sprintf('Unable to autoload %s.', $fqClassName));
    }
});