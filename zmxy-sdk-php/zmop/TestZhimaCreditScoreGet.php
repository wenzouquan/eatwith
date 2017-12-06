<?php 
include('ZmopClient.php');
class TestZhimaCreditScoreGet {
    //芝麻信用网关地址
    public $gatewayUrl = "https://zmopenapi.zmxy.com.cn/openapi.do";
    //商户私钥文件
    public $privateKeyFile = "/Users/dfrobot/winn/www/eatWith/zmxy-sdk-php/zmop/rsa_private_key.pem";
    //芝麻公钥文件
    public $zmPublicKeyFile = "/Users/dfrobot/winn/www/eatWith/zmxy-sdk-php/zmop/rsa_public_key.pem";
    //数据编码格式
    public $charset = "UTF-8";
    //芝麻分配给商户的 appId
    public $appId = "300000912";

    public function testZhimaCreditScoreGet(){
         $client = new ZmopClient($this->gatewayUrl,$this->appId,$this->charset,$this->privateKeyFile,$this->zmPublicKeyFile);
         $request = new ZhimaCreditScoreGetRequest();
        // var_dump($request);
         $request->setChannel("apppc");
         $request->setPlatform("zmop");
         $request->setTransactionId("201512100936588040000000465158");// 必要参数 
         $request->setProductCode("w1010100100000000001");// 必要参数 
         $request->setOpenId("268810000007909449496");// 必要参数 
         $response = $client->execute($request);
         print_r($response);
         echo json_encode($response);
    }
}

