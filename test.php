<?php

$string ='{
    "Body": {
        "stkCallback": {
            "MerchantRequestID": "42509-40875521-1",
            "CheckoutRequestID": "ws_CO_301220211924223803",
            "ResultCode": 0,
            "ResultDesc": "The service request is processed successfully.",
            "CallbackMetadata": {
                "Item": [
                    {
                        "Name": "Amount",
                        "Value": 1
                    },
                    {
                        "Name": "MpesaReceiptNumber",
                        "Value": "PLU7W1HZO3"
                    },
                    {
                        "Name": "Balance"
                    },
                    {
                        "Name": "TransactionDate",
                        "Value": 20211230192445
                    },
                    {
                        "Name": "PhoneNumber",
                        "Value": 254727428723
                    }
                ]
            }
        }
    }
}';

$response = json_decode($string,true);

// print_r($response['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value']);
$value = $response['Body']['stkCallback']['CallbackMetadata']['Item'];
        $date = date('m/d/Y H:i:s',);
        
        if(count($value)==4)
        {
            echo count($value);
        }
        else if(count($value)==5)
        {
            echo count($value);
        }

// foreach($decoded_string as $data)
// {
//     $data['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
// }
//print_r($decoded_string);

?>