<?php

class Linkbucks
{
  use Curl;

   public $data         = array();
   public $originalLink = null;
   public $url          = null;

  public function __construct(){
    $this->data       = $this->getDataAccount();
    $this->url        = 'https://www.linkbucks.com/api/createLink/single';
  }

  public function getDataAccount()
  {
    return [
          'user'=>'testuser',  //my username
          'apiPassword'=>'778f43e430bu21m',  //my API password
          "originalLink"=>$this->getOriginalLink(),  //the URL that need to be shorted
          "adType"=>2,  //paid links
          "contentType"=>1,   //not an adult content
          "domain"=>"linkbucks.com"  //target domain, a lot of possibility here, the default is: linkbucks.com
      ];
  }
  public function setOriginalLink($link)
  {
    $this->originalLink = $link;
    $this->data['originalLink'] = $link;
  }
  public function getOriginalLink()
  {
    return $this->originalLink;
  }

}
