<?php
declare(strict_types=1);


namespace App\Service\Monolog;


class UserProcessor
{
    public function customize(array $record)

    {
        $user = $record['context']['user'];
        $record['message'] = "({$user->getEmail()})" . $record['message'];
        return $record;
    }
}