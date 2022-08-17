<?php

$baseDir = __DIR__ . '/../../';

$finder = PhpCsFixer\Finder::create()
    ->in([
        $baseDir . 'src',
        $baseDir . 'tests',
    ])
    ->name('*.php');

$config = new PhpCsFixer\Config();
return $config
    /*->setRules([
        '@PSR12' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])*/
    ->setFinder($finder)
    ;
