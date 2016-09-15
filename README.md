# Linkbucks URL converter
![Linkbucks Logo](https://raw.githubusercontent.com/bran921007/Linkbucks-Api/master/logo.gif)
LinkBucks allows you to make cash from the links your users post, from the links you place on your website, or from the posts you make in a forum. It is simple and easy to get started making money



## Features overview
- Convert conventional URL into Linkbucks URL 

**How to use**

After download the source include the Curl.php and Linkbucks.php and add the following code into your code project

```
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
    
    
```
