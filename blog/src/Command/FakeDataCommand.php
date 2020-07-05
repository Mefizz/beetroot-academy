<?php

namespace App\Command;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class FakeDataCommand extends Command
{
    protected static $defaultName = 'app:fake-data';

    private $em;

    public function __construct(string $name = null, EntityManagerInterface $em)
    {
        parent::__construct($name);
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
        $faker = Factory::create('ru_RU');

        $categories = $this->em->getRepository(Category::class)->findAll();
        for ($i = 0; $i < 30; $i++) {
            $article = new Article();
            $article->setTitle($faker->text(50));
            $article->setBody($faker->text(1000));
            $randCategoryId = array_rand($categories);
            $article->setCategory($categories[$randCategoryId]);
            $this->em->persist($article);
            $this->em->persist($categories[$randCategoryId]);
        }
        $this->em->flush();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
