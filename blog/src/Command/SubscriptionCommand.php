<?php

namespace App\Command;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SubscriptionCommand extends Command



{
    protected static $defaultName = 'app:subscription';
    private $em;

    private $mailer;

    private $router;
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct(self::$defaultName);
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $articles = $input->getFreshArticles();
        $users = $this->em->getRepository(User::class)->findBy(['isSubscribed'=> 1]);

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }

    private function getFreshArticles($limit = 10)
    {
        $qb = $this->em-createQueryBuilder()
            ->from(Article::class, 'a')
            ->select('a')
            ->orderBy('a.createdAt', 'desc')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

}
