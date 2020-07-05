<?php
declare(strict_types=1);


class Mailer
{

    const SMTP = 'smtp.gmail.com';

    const PORT = '465';

    const USERNAME = 'bookstore.beetroot@gmail.com';

    const PASS = 'beetroot123';

    public function notifyFeedback()
    {
        $body = $this->getBody('');
//        $message = (new Swift_Message('Заказ на сайте'))
//            ->setFrom(['bookstore.beetroot@gmail.com' => 'Магазин'])
//            ->setTo(['work.zjiodeu@gmail.com'])
//            ->setBody($body, 'text/html');

        return $this->getInternalMailer()->send($message);
    }

    /**
     * @return int
     */
    public function notifyOrder()
    {
        try {
            $body = $this->getBody('my-email-template');

            $message = (new Swift_Message('Заказ на сайте'))
                ->setFrom(['bookstore.beetroot@gmail.com' => 'Магазин'])
                ->setTo(['work.zjiodeu@gmail.com'])
                ->setBody($body, 'text/html');
            $failedRecipients = [];
            $result = $this->getInternalMailer()->send($message, $failedRecipients);
            if (!$result) {
              //  $this->saveFailed();
            }
        } catch (\Throwable $err) {
           // $this->saveFailed();
        }
    }

    /**
     * @return Swift_Mailer
     */
    private function getInternalMailer(): Swift_Mailer
    {
        $transport = (new Swift_SmtpTransport(Mailer::SMTP, self::PORT, 'ssl'))
            ->setUsername(self::USERNAME)
            ->setPassword(self::PASS);
        // Create the Mailer using your created Transport
        return new Swift_Mailer($transport);
    }

    /**
     * @param  string $template
     * @return string
     */
    private function getBody(string $template) : string
    {
        ob_start();
        require "$template.php";
        return ob_get_clean();
    }
}