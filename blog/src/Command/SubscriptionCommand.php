<?php

namespace App\Command;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class SubscriptionCommand extends Command
{
    protected static $defaultName = 'app:subscription';

    private $em;
    private $mailer;

    private $router;

    private $appDomain;

    /**
     * SubscriptionCommand constructor.
     * @param EntityManagerInterface $em
     * @param MailerInterface $mailer
     * @param RouterInterface $router
     * @param $appDomain
     */
    public function __construct(
        EntityManagerInterface $em,
        MailerInterface $mailer,
        RouterInterface $router,
        $appDomain
    ) {
        parent::__construct(self::$defaultName);
        $this->em = $em;
        $this->mailer = $mailer;
        $this->router = $router;
        $this->appDomain = $appDomain;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $articles = $this->getFreshArticles();
        $users = $this->em->getRepository(User::class)->findBy(['isSubscribed' => 1]);
        /** @var User $user */
        foreach ($users as $user) {
            $io->note("Sending to the user {$user->getEmail()}");
            $email = (new TemplatedEmail())
                ->from('no-reply@symfony-blog.com.ua')
                ->to(new Address($user->getEmail(), 'Beetroot'))
                ->subject('Рассылка с сайта!!!')

                // path of the Twig template to render
                ->htmlTemplate('emails/subscription.html.twig')

                // pass variables (name => value) to the template
                ->context([
                    'articles' => $articles,
                    'app_domain' => $this->appDomain,
                    'unsubscribe_url' => $this->router->generate(
                        'app_unsubscribe',
                        ['id' => $user->getId()]
                    )
                ]);
            $this->mailer->send($email);
            $io->note("Mail sent");
        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }

    /**
     * @param int $limit
     * @return int|mixed|string
     */
    private function getFreshArticles($limit = 10)
    {
        return $this->em->createQueryBuilder()
            ->from(Article::class, 'a')
            ->select('a')
            ->orderBy('a.createdAt', 'desc')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
