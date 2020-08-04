<?php
namespace crawler;

include_once 'Repository/CrawlerRepository.php';
include_once 'Repository/FileHandlerRepository.php';
include_once 'Configuration/config.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use crawler\Repository\Crawl;
use crawler\Repository\FileHandler;

class CrawlerCommand extends Command
{
    protected function configure()
    {
        $this->setName('crawl');
        $this->setDescription('Crawls a website');
        $this->addArgument('website', InputArgument::REQUIRED, 'Domain name e.g. http://example.com');
        $this->addArgument('keywords', InputArgument::REQUIRED, 'Keywords e.g. hello|World|php');
        $this->setHelp('This command allows you to crawl a website');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$FileHandler = new FileHandler();
        $Keywords = explode(',', $input->getArgument('keywords'));
        var_dump($Keywords);

        //Instantiate the Crawler Object
        $Crawler = new Crawl($input->getArgument('website'), $Keywords);
        //Get the JSON Response
        $Response = $Crawler->Crawl();
        var_dump($Response);
        //Write on a speciifc json file
        //$FileHandler->WriteFile($Response);
        $output->writeln('Website  :: '.$input->getArgument('website'));
        $output->writeln('Keywords :: '.$input->getArgument('keywords'));
        return Command::SUCCESS;
    }
}









?>