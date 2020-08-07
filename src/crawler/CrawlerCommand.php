<?php
namespace crawler;

include_once 'Repository/CrawlerRepository.php';
include_once 'Repository/FileHandlerRepository.php';
require_once __DIR__.'/Configuration/config.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use crawler\Configuration\Config;
use crawler\Repository\Crawler;
use crawler\Repository\FileHandler;

class CrawlerCommand extends Command
{
    protected function configure()
    {
        $this->setName('crawl');
        $this->setDescription('Crawls a website');
        $this->addArgument('website', InputArgument::OPTIONAL, 'Domain name e.g. http://example.com');
        $this->addArgument('keywords', InputArgument::OPTIONAL, 'Keywords e.g. hello|World|php');
        $this->setHelp('This command allows you to crawl a website');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = new Config();
        //var_dump($config->path);
        
        $FileHandler = new FileHandler();
        
        #Read File if input not provided from Commandline Console

        #Read Website
        if($input->getArgument('website') == '' || empty($input->getArgument('website')))
        {
            $WebsiteContent = $FileHandler->ReadFile($config->path['website']);
            $Website = $WebsiteContent['name'][0];
            //var_dump($Website);
        }
        else
        {
            $Website = $input->getArgument('website');
        }

        #Read Keywords
        if($input->getArgument('keywords') == '' ||  empty($input->getArgument('keywords')))
        {
            $KeywordContent = $FileHandler->ReadFile($config->path['keyword']);
            $Keywords = $KeywordContent['name'];
            //var_dump($Keywords);
        }
        else
        {
            $Keywords = explode(',', $input->getArgument('keywords'));
        }

        #Handle empty data sets
        if(empty($Website) || empty($Keywords))
        {
            echo 'No website or keyword found!\n Please check the configuration files or pass the arguments on the console! \n Thank You!';
            return Command::FAILURE;
        }

        //Instantiate the Crawler Object
        $Crawler = new Crawler($input->getArgument('website'), $Keywords);
        
        //Get the JSON Response
        $Response = $Crawler->Crawl();
        //var_dump($Response);

        //Write on a speciifc json file
        $FileHandler->WriteFile($Response, $config->path['result']);

        echo 'Response saved in the file successfully!';
        //$output->writeln('Website  :: '.$input->getArgument('website'));
        //$output->writeln('Keywords :: '.$input->getArgument('keywords'));
        return Command::SUCCESS;
    }
}
?>