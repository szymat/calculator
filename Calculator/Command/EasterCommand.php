<?php

namespace Calculator\Command;

use Calculator\Strategy\EasterEggStrategy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EasterCommand extends Command
{
    protected static $defaultName = 'calculator:egg';

    protected function configure(): void
    {
        $this
            // configure an argument
            ->addArgument('a', InputArgument::REQUIRED, 'First number.')
            ->addArgument('b', InputArgument::REQUIRED, 'First number.')
            // ...
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $strategy = new EasterEggStrategy();
        $a = $input->getArgument('a');
        $b = $input->getArgument('b');
        if(!is_numeric($a) || !is_numeric($b)) {
            $output->writeln('Invalid input, must be numeric');
            return Command::FAILURE;
        }
        $response = $strategy->execute($input->getArgument('a'), $input->getArgument('b'));

        $lines = preg_split("/\r\n|\n|\r/", $response);
        usleep(200000);
        foreach ($lines as $line) {
            $output->writeln("<info>$line</info>");
            usleep(200000);
        }
        return Command::SUCCESS;
    }
}