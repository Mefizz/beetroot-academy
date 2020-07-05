<?php
declare(strict_types=1);


namespace App\Service\Page;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class DateFormatter
 * @package App\Service\Page
 */
class DateFormatter extends AbstractExtension
{
    /**
     * @return array|TwigFilter[]
     */
    public function getFilters()
    {
        return [
            new TwigFilter('comment_date', [$this, 'format']),
        ];
    }

    /**
     * @param \DateTime $date
     * @return string
     */
    public function format(\DateTime $date)
    {
        $currentDate = new \DateTime();
        $diff = ($currentDate->getTimestamp() -  $date->getTimestamp()) / 60;
        if ($diff < 60) {
            return sprintf("%d минут назад", (int) $diff);
        }
        return $date->format('Y/m/d H:i:s');
    }
}