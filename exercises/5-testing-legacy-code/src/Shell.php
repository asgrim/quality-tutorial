<?php

namespace Exercises\Five;

class Shell
{
    protected $_last_output;
    protected $_last_errno;

    public function getLastError()
    {
        return $this->_last_errno;
    }

    public function getLastOutput()
    {
        return $this->_last_output;
    }

    public function Exec($cmd, $noisy = false)
    {
        if($noisy) echo "<strong>Command: " . $cmd . "</strong><br /><br />";

        $this->_last_errno = 0;
        $this->_last_output = array();

        exec($cmd . " 2>&1", $this->_last_output, $this->_last_errno);

        if($noisy)
        {
            echo "Output:<pre>";
            var_dump($this->_last_output);
            echo "Exit code: " . $this->_last_errno;
            echo "</pre>";
            echo "<hr />";
            exit($this->_last_errno);
        }
    }
}
