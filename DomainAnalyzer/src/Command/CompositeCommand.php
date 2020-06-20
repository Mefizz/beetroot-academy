<?php
declare(strict_types=1);

namespace App\Command;


class CompositeCommand extends Command
{
    private $commands;

    /**
     * CompositeCommand constructor.
     * @param Command ...$commands
     */
    public function __construct(Command ...$commands)
    {
       $this->commands = $commands;
    }

    public function run(string $domain): array
    {
        $result = [];
        foreach ($this->commands as $command) {
            $result = array_merge($result, $command->run($domain));
        }
        return $result;
    }
}