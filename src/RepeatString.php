<?php

namespace App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RepeatString extends Command
{
    protected function configure(): void
    {
        $this
            ->setHelp('Команда повторяет строку заданное кол-во раз')
            ->setName('repeat')
            ->addArgument('string', InputArgument::REQUIRED, 'Какую строку повторяем.')
            ->addArgument('count', InputArgument::OPTIONAL, 'Сколько раз повторяем.', 2)
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $count = $input->getArgument('count');
        for ($i = 0; $i < $count; $i++) {
            $output->writeln($input->getArgument('string'));
        }
        return Command::SUCCESS;
    }
}
