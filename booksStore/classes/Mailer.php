<?php
declare(strict_types=1);


class Mailer
{
    const STMP = 'smtp.gmail.com';
    const PORT = '465';
    const USERNAME = 'bookstore.beetroot@gmail.com';
    const PASS = 'beetroot123';

    public function notifyFeedback()
    {
        $body = $this->getBody('feedback-result-mail');
        $message = (new Swift_Message('Feedback about product'))
            ->setFrom(['artimeck@gmail.com' => 'Consumer'])
            ->setTo(['andr.kopylets@gmail.com'])
            ->setBody($body, 'text/html');

        return $this->getInternalMailer()->send($message);
    }

    public  function notifyOrder()
    {


        $body = $this->getBody('my-email-template');


        $message = (new Swift_Message('Заказ на сайте'))
            ->setFrom(['bookstore.beetroot@gmail.com' => 'Магазин'])
            ->setTo(['artimeck@gmail.com'])
            ->setBody($body, 'text/html');

        return $this->getInternalMailer()->send($message);

    }
    private function getInternalMailer() : Swift_Mailer
    {
        $transport = (new Swift_SmtpTransport(Mailer::STMP, self::PORT, 'ssl'))
            ->setUsername(self::USERNAME)
            ->setPassword(self::PASS)
        ;
// Create the Mailer using your created Transport
        return new Swift_Mailer($transport);
    }

    /**
     * @param $template
     * @return false|string
     */
    private function getBody($template) : string
    {
        ob_start();
        require "$template.php";
        return ob_get_clean();
    }
}