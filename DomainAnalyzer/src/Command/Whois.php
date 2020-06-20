<?php
declare(strict_types=1);

namespace App\Command;

/**
 * Class Whois
 * @package App\Command
 */
class Whois extends Command
{

    /**
     * @param $domain
     * @return array
     */
    public function run(string $domain) : array
    {
        return $this->execute("/usr/bin/whois $domain");
    }
}