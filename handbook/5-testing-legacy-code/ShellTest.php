<?php
declare(strict_types=1);

namespace ExercisesTest\Five;

use Exercises\Five\Shell;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Exercises\Five\Shell
 */
final class ShellTest extends TestCase
{
    use PHPMock;

    public function testExecWhenNotBeingNoisy() : void
    {
        $expectedCommand = uniqid('command', true);
        $expectedOutput = [uniqid('lastLineOfOutput', true)];
        $expectedReturn = random_int(1, 254);

        $execCallMock = $this->getFunctionMock('Exercises\Five', 'exec');
        $execCallMock->expects(self::once())
            ->willReturnCallback(
                function (
                    string $command,
                    &$output,
                    &$returnVar
                ) use (
                    $expectedCommand,
                    $expectedOutput,
                    $expectedReturn
                ) {
                self::assertSame($expectedCommand . ' 2>&1', $command);
                $output = $expectedOutput;
                $returnVar = $expectedReturn;
            });

        $shell = new Shell();
        $shell->Exec($expectedCommand, false);
        self::assertSame($expectedOutput, $shell->getLastOutput());
        self::assertSame($expectedReturn, $shell->getLastError());
    }

    public function testExecWithNoisyEnabled() : void
    {
        if (!\extension_loaded('uopz')) {
            self::markTestSkipped('uopz extension is not enabled');
            return;
        }

        uopz_allow_exit(false); // NOTE: not strictly required as `false` is default when enabled

        $expectedCommand = uniqid('command', true);
        $expectedOutput = [uniqid('lastLineOfOutput', true)];
        $expectedReturn = random_int(1, 254);

        $execCallMock = $this->getFunctionMock('Exercises\Five', 'exec');
        $execCallMock->expects(self::once())
            ->willReturnCallback(
                function (
                    string $command,
                    &$output,
                    &$returnVar
                ) use (
                    $expectedCommand,
                    $expectedOutput,
                    $expectedReturn
                ) {
                    self::assertSame($expectedCommand . ' 2>&1', $command);
                    $output = $expectedOutput;
                    $returnVar = $expectedReturn;
                });

        $shell = new Shell();
        $shell->Exec($expectedCommand, true);
        self::assertSame($expectedOutput, $shell->getLastOutput());
        self::assertSame($expectedReturn, $shell->getLastError());

        $expectStdoutFormat = <<<EOF
<strong>Command: %s</strong><br /><br />Output:<pre>array(1) {
  [0]=>
  string(%d) "%s"
}
Exit code: %d</pre><hr />
EOF;

        $this->expectOutputString(sprintf(
            $expectStdoutFormat,
            $expectedCommand,
            \strlen($expectedOutput[0]),
            $expectedOutput[0],
            $expectedReturn
        ));
    }
}
