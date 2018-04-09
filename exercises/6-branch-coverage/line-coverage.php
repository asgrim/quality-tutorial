<?php
declare(strict_types=1);

require '../../vendor/autoload.php';
require 'src.php';

$coverage = new \SebastianBergmann\CodeCoverage\CodeCoverage();
$coverage->filter()->addFileToWhitelist('src.php');
$coverage->start('truefalse');
foo(true, false);
$coverage->stop();
$coverage->start('falsetrue');
foo(false, true);
$coverage->stop();

$writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade();
$writer->process($coverage, 'coverage');
