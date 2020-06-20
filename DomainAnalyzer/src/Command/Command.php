<?php
declare(strict_types=1);

namespace App\Command;

/**
 * Class Command
 * @package App\Command
 */
abstract class Command
{

    /**
     * @param  string $command
     * @return array
     */
    protected function execute(string $command) : array
    {
        $output = [];
        exec(escapeshellcmd($command), $output);
        return $output;
    }

    abstract public function run(string $domain) : array;
}