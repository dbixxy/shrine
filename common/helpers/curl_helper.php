<?php
    function postCURL($_url, $_param){

        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v) 
        { 
          $postData .= $k . '='.$v.'&'; 
        }
        rtrim($postData, '&');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output=curl_exec($ch);

        curl_close($ch);

        return json_encode($output);
    }

    function postCURLarray($_url, $_param_arr){

      $field_string = http_build_query($_param_arr);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, false); 
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);    
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $output=curl_exec($ch);

      curl_close($ch);

      return json_encode($output);
    }

    function postCURLjsonWithArray($_url, $_param_arr){

      $field_json = json_encode($_param_arr);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, false); 
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $field_json);    
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $output=curl_exec($ch);

      curl_close($ch);

      return json_encode($output);
    }

    function getCURL($_url){

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

      $output=curl_exec($ch);

      curl_close($ch);

      return $output;
    }
    
  