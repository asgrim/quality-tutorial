<?php
declare(strict_types=1);

require 'branch-coverage-to-dot.php';
require 'src.php';

// Branch coverage - not easy to visualise!
$dotFile = tempnam(sys_get_temp_dir(), 'paths.dot');
xdebug_start_code_coverage(XDEBUG_CC_DEAD_CODE | XDEBUG_CC_UNUSED | XDEBUG_CC_BRANCH_CHECK);

foo(true, false);
foo(false, true);

file_put_contents($dotFile, branch_coverage_to_dot(xdebug_get_code_coverage()));
exec('dot -Tpng ' . escapeshellarg($dotFile) . '> coverage.png');
unlink($dotFile);
