<?php
namespace crawler\Configuration;

class Config
{
    public $path;

    function __construct()
    {
        $this->path=array();
        $this->path['website']= 'src/crawler/Websites/Sites.txt';
        $this->path['keyword']= 'src/crawler/Keywords/Keywords.txt';
        $this->path['result']='src/crawler/CrawlerResult/response.json';
    }
}
	
?>