<?php

function getSetting($name){
    return \App\Application\Model\Setting::where('name' , $name)->first()->body_setting;
}

function getFawryreferenceNumber($item){

    $client = new GuzzleHttp\Client(['base_uri' => 'http://mis.bu.edu.eg/fawry_pay/FAWRY_PAYMENTS.asmx/GetFawryReferenceNumber']);
    $Data=[
        'form_params' => [
        'PAYMENT_SERVICES_ID' => 1,
        'National_ID' => $item->nid,
        'Phone' => $item->phone,
        'FULL_Name_AR' => $item->name
        ]];

    // Send a request to http://localhost/WebServiceApp/public/api/user/tipoprojeto/
    
    try {
        $response = $client->request('POST', '',$Data);
        if($response->getStatusCode()==200){
            $xml = new \XMLReader();
            $xml->XML($response->getBody()->getContents());
            $referenceNumber = '';
           
                while ($xml->read()) {
                   // dd($xml);
                    if ($xml->nodeType == \XMLReader::ELEMENT) {
                        //assuming the values you're looking for are for each "item" element as an example
                        $name=$xml->name;
                        if ($xml->name == 'referenceNumber'||$xml->name == 'string') {
                            $referenceNumber = str_replace(['referenceNumber:','"',":","referenceNumber"],'',$xml->readString());
                        }
                    }
                }
            
            return $referenceNumber;
        }
        else{
          return null;
        }
     } catch (Exception $e) {
         info("error in creating referenceNumber for inquest no:".$item->id);
         info($e);
          return null;
        }
}

function checkFawryreferenceNumber($item){
    if(isset($item->referenceNumber)){
        $client = new GuzzleHttp\Client(['base_uri' => 'http://mis.bu.edu.eg/fawry_pay/FAWRY_PAYMENTS.asmx/PAYMENT_Merchant_S']);
        $Data=[
            'form_params' => [
            'PAYMENT_Merchant_ID' => $item->referenceNumber
            ]];
        try {
            // Send a request to http://localhost/WebServiceApp/public/api/user/tipoprojeto/
            $response = $client->request('POST', '',$Data);
            if($response->getStatusCode()==200){
                $xml = new \XMLReader();
                $xml->XML($response->getBody()->getContents());
                $checkreferenceNumber = 0;
               
                    while ($xml->read()) {
                       // dd($xml);
                        if ($xml->nodeType == \XMLReader::ELEMENT) {
                            //assuming the values you're looking for are for each "item" element as an example
                            $name=$xml->name;
                            if ($xml->name == 'payment_Flag') {
                                $checkreferenceNumber = $xml->readString();
                            }
                        }
                    }
                
                return $checkreferenceNumber;
            }
            else{
              return 0;
            }
        } catch (Exception $e) {
            info("error in check referenceNumber for inquest no:".$item->id);
            info($e);
              return 0;
            }
    }
    return 0;
    
}
