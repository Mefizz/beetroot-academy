<?php
declare(strict_types=1);

namespace App\View;


/**
 * Class Template
 * @package App\View
 */
class Template
{
    const DEFAULT_TEMPLATE = 'main';
    const AlTERNATIVE_TEMPLATE = 'table';
    /**
     * @var array
     */
    private $output;

    /**
     * @var
     */
    private $template;

    /**
     * Template constructor.
     * @param array $output
     */
    public function __construct(array $output, $template = self::DEFAULT_TEMPLATE)
    {
        $template = $_POST['type'];
        $this->output = $output;
        $this->template = $template;
    }

    /**
     * @return string
     */
    private function getTemplate() : string
    {
        $output = $this->output;
        ob_start();
        require "templates/{$this->template}.phtml";
        return ob_get_clean();
    }

    public function  __toString()
    {
        return $this->getTemplate();
    }

}