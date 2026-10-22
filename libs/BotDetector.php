<?php
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class BotDetector
{
    public static function isBot(): bool
    {
        $detector = new CrawlerDetect;
        return $detector->isCrawler();
    }
   
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
