<?php

namespace AnalyticsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand as ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\StringInput;
use AnalyticsBundle\Entity\CronTask;

class CronTasksRunCommand extends ContainerAwareCommand
{
    private $output;

    protected function configure()
    {
        $this
            ->setName('crontasks:run')
            ->setDescription('Runs Cron Tasks if needed')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        
        
        $output->writeln('<comment>Running Cron Tasks...</comment>');

        $this->output = $output;
        $output->writeln('<comment>Doctrine...</comment>');
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $output->writeln('<comment>Get Repository...</comment>');
        $crontasks = $em->getRepository('AnalyticsBundle:CronTask')->findAll();

        $output->writeln('<comment>Foreach crontasks...</comment>');
        foreach ($crontasks as $crontask) {
            // Get the last run time of this task, and calculate when it should run next
            $output->writeln('<comment>Geting last run...</comment>');
            $lastrun = $crontask->getLastRun() ? $crontask->getLastRun()->format('U') : 0;
            $output->writeln('<comment>Generating next run...</comment>');
            $nextrun = $lastrun + $crontask->getInterval();

            // We must run this task if:
            // * time() is larger or equal to $nextrun
//            $output->writeln('<comment>Check it\'s time to next run... nextrun=' . $nextrun . '</comment>');
            $run = (time() >= $nextrun) ? 1 : null;

//            $output->writeln('<comment>If next run is >=1... Run=' . $run . '</comment>');
//            if ($run) {
                $output->writeln('<comment>First if statament...</comment>');
                $output->writeln(sprintf('Running Cron Task <info>%s</info>', $crontask->getName()));

                // Set $lastrun for this crontask
                $crontask->setLastRun(new \DateTime());

                try {
                    $commands = $crontask->getCommands();
                    foreach ($commands as $command) {
                        $output->writeln(sprintf('Executing command <comment>%s</comment>...', $command));

                        // Run the command
                        $this->runCommand($command);
                    }

                    $output->writeln('<info>SUCCESS</info>');
                } catch (\Exception $e) {
                    $output->writeln('<error>ERROR</error>');
                }

                // Persist crontask
                $em->persist($crontask);
//            } else {
//                $output->writeln(sprintf('Skipping Cron Task <info>%s</info>', $crontask));
//            }
        }

        // Flush database changes
        $em->flush();

        $output->writeln('<comment>Done!</comment>');
   
        
    }

    private function runCommand($string)
    {
        // Split namespace and arguments
        $namespace = split(' ', $string)[0];

        // Set input
        $command = $this->getApplication()->find($namespace);
        $input = new StringInput($string);

        // Send all output to the console
        $returnCode = $command->run($input, $this->output);

        return $returnCode != 0;
    }
}

