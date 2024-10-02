<?php
if(isset($_GET['Order'])){
    $text = $_GET['Order'];   
    
    $fields = explode(PHP_EOL, urldecode($text));
    $output_array = [];
    
    $output_array['Order_Number']  = "";
    $output_array['Date']  = "";
    $output_array['Name']  = "";
    $output_array['Email']  = "";
    $output_array['Phone']  = "";
    $output_array['Products']  = "";
    $output_array['Total']  = "";
    
    foreach($fields as $field){
        $field_values = explode(':',$field);
        if($field_values[0] == 'Order Number'){
            $output_array['Order_Number'] = $field_values[1];
        }
        if($field_values[0] == 'Date'){
            $output_array['Date'] = $field_values[1];
        }
        if($field_values[0] == 'Name'){
            $output_array['Name'] = $field_values[1];
        }
        if($field_values[0] == 'Email'){
            $output_array['Email'] = $field_values[1];
        }
        if($field_values[0] == 'Phone'){
            $output_array['Phone'] = $field_values[1];
        }
        if($field_values[0] == 'Products'){
            $output_array['Products'] = $field_values[1];
        }
        if($field_values[0] == 'Total'){
            $output_array['Total'] = str_replace("TSh","",str_replace(",","",$field_values[1]));
        }
    }
    
    $request = curl_init();

    curl_setopt($request, CURLOPT_URL,"https://automations-n8n.cpbwkx.easypanel.host/webhook-test/440c97b2-38b3-4095-ad69-84b30539d43b");
    curl_setopt($request, CURLOPT_POST, 1);
    curl_setopt($request, CURLOPT_POSTFIELDS,
            "text=".json_encode($output_array));

    // catch the response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($request);

    curl_close ($request);
    
      
    
    
    
    
    
}else{
    
    
    
    
    $request = curl_init();
    

    curl_setopt($request, CURLOPT_URL,"https://automations-n8n.cpbwkx.easypanel.host/webhook-test/440c97b2-38b3-4095-ad69-84b30539d43b");
    curl_setopt($request, CURLOPT_POST, 1);
    curl_setopt($request, CURLOPT_POSTFIELDS,
            "order=Bad_request");

    // catch the response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($request);

    curl_close ($request);
    
    
}
    
    
    
        
    

?>