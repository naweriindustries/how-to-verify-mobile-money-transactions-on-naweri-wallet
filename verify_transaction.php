<?php

 





//https://wallet.naweri.com


        $merchant_key =  "------------------------"; // Enter here your API Key Here From Your Naweri Account
$merchant_account = "----------------------";// Enter Your Merchant Email Address Here
$txid = strip_tags($_GET['reference']);
$txn_status=strip_tags($_GET['status']);
$payee_account = strip_tags($_GET['payee']);
$item_id=strip_tags($_GET['itemid']);
$item_name = strip_tags($_GET['itemname']);
$itemprice= strip_tags($_GET['amount']);
$item_description=strip_tags($_GET['itemdescription']);
$item_currency = strip_tags($_GET['currency']);
$payment_date=strip_tags($_GET['date_paid']);

$verification_link = "https://wallet.naweri.com/api_request/verify/?api_key=$merchant_key&merchant=$merchant_account&txnid=$txid";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$verification_link);
$resultsi=curl_exec($ch);
curl_close($ch);
$requltsi = json_decode($resultsi);

echo $requltsi;
$main_url=$verification_link;
$str = file_get_contents($main_url);
// Gets Webpage Data if(strlen($str)>0)
{
$str = trim(preg_replace('/\s+/', ' ', $str));
preg_match("/\<div\>(.*)\<\/div\>/i",$str,$data);
$data=$data[1];
}
if($data=="success")
{



 

//convert the returned currency to the original posted currency * (feature only works for successfull transactions).

$currency_convert_api_link = "https://wallet.naweri.com/api_request/convert/?api_key=$merchant_key&merchant=$merchant_account&txnid=$txid";

$sitr = file_get_contents($currency_convert_api_link);

// Gets Webpage Data if(strlen($str)>0)

{

$sitr = trim(preg_replace('/\s+/', ' ', $sitr));

preg_match("/\<div\>(.*)\<\/div\>/i",$sitr,$converted_currencies);

$original_posted_currency=$converted_currencies[1];



}




echo $original_posted_currency; // the original amount returned on txn verification. use this





 









//echo $original_posted_currency;

//posted amount = $original_posted_currency;

//posted currency = (define your system currency here')

//successfull

 echo($data);
}
elseif($data=="failed")
{
//transaction_failed
 echo($data);

  


}
elseif($data=="unpaid") {
// Buyer Did Not Complete Transaction
echo($data);

      


}
elseif($data=="error") {
// Buyer Did Not Complete Transaction
echo($data);

      
}













 














  

  ?>
