<?php
use Linkbucks;
class Post{

    public function linkbucks(Linkbucks $linkbucks)
    {
      //call linkbucks API
      $linkbucks->setOriginalLink($_POST['url']);

      $returned_data= $linkbucks->post($linkbucks->url, json_encode($linkbucks->getDataAccount() ));
      $parsed_data=json_decode($returned_data);

      //simple error checking
      if (!empty($parsed_data->link)) {
          echo "This is your short URL : ".$parsed_data->link;
          return response()->json(['status'=>true, 'linkbuck' => $parsed_data->link]);
      } else {
          echo "Something wrong! ".$parsed_data->errorDescription;
          return response()->json(['status'=>false, 'linkbuck' => $parsed_data->errorDescription]);
      }
    }


}
