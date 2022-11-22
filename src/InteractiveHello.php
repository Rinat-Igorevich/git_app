<?php

namespace App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class InteractiveHello extends Command
{
    protected function configure(): void
    {
        $this
            ->setHelp('Only english?')
            ->setName('interactiveHello')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $nameQuestion = new Question(
            'Пожалуйста введите Ваше имя'
        );
        $ageQuestion = new Question(
            'Пожалуйста введите Ваш возраст'
        );
        $sexQuestion = new ChoiceQuestion(
            'Пожалуйста введите Ваш пол',
            ['м', 'ж']
        );
        $sexQuestion->setErrorMessage('Выберите из предложенных! В РФ запрещена пропаганда всех этих нетрадиционных штучек!');

        $name = $helper->ask($input, $output, $nameQuestion);
        $age = $helper->ask($input, $output, $ageQuestion);
        $sex = $helper->ask($input, $output, $sexQuestion);
        $output->writeln('Здравствуйте, ' . $name . ' Ваш возраст: ' . $age . ' Ваш пол: ' . $sex);
        return Command::SUCCESS;
    }
}