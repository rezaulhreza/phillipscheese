<html>
<head>
	  <meta name="csrf-token" content="{{ csrf_token() }}">

<?php
	$transaction_uuid = $_POST['transaction_uuid'];
	$locale = $_POST['locale'];
	$transaction_type = $_POST['transaction_type'];
	$reference_number = $_POST['reference_number'];
	$amount = $_POST['amount'];
	$currency = $_POST['currency'];
	$signed_date_time = $_POST['signed_date_time'];	
	$access_key = $_POST['access_key'];
	$profile_id = $_POST['profile_id'];
	$signed_field_names = $_POST['signed_field_names'];
	

        $SECRET_KEY = "cba583ce88f24ee2b5b64bc619cc31ef135d855f7855433695bf55366d4d2d72b238ad015dd2488bb216fbf72a84a6b615bcce0c064b42d48de8f5acbdbe1160691b6d63b9b444798115528cb96ca3a7522ded6f52254a42b3f23eb866b02d90669b8a8b3c0546298ef442812f0553a9948bba2bc2c94b6c8beef16f4046a066";
	
	define ('SECRET_KEY', 'cba583ce88f24ee2b5b64bc619cc31ef135d855f7855433695bf55366d4d2d72b238ad015dd2488bb216fbf72a84a6b615bcce0c064b42d48de8f5acbdbe1160691b6d63b9b444798115528cb96ca3a7522ded6f52254a42b3f23eb866b02d90669b8a8b3c0546298ef442812f0553a9948bba2bc2c94b6c8beef16f4046a066');
	
        
	foreach($_REQUEST as $parameter_name => $parameter_value) {
        $params[$parameter_name] = $parameter_value;
    }
	
	function sign ($params) {
		return signData(buildDataToSign($params), SECRET_KEY);
	}

	function signData($data, $secretKey) {
		return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
	}

	function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
	}

	function commaSeparate ($dataToSign) {
		return implode(",",$dataToSign);
	}
	
?>
        <style>
                table, th, td
		{
			border: 1px solid black;
			border-collapse: collapse;
                        font-face: Tahoma;
		}
			
		th, td
		{
			padding: 5px;
		}
	</style>
</head>
<body>
        <font face="Tahoma">
	
	<h1>
		Smartpay Fuse Pre Payment HPP
	</h1>
	<form method="post" action="https://testsecureacceptance.cybersource.com/pay" name="GatewayPush">
	<table>
		<col width="180">
		<col width="180">
		
	<?php
            foreach($params as $parameter_name => $parameter_value) {
                echo "<tr><td>" . $parameter_name . "</td><td>" . $parameter_value . "</td></tr>";
            }
        ?>
	</table>
	
	<?php
        foreach($params as $parameter_name => $parameter_value) {
            echo "<input type=\"hidden\" id=\"" . $parameter_name . "\" name=\"" . $parameter_name . "\" value=\"" . $parameter_value . "\"/>\n";
        }
        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
		
		echo "<br><br>";
		print buildDataToSign($params);
		echo "<br><br>";
		print sign($params);
    ?>
	<br /><br />
	
	<input type="submit" id="submit" value="Pay up!" style="background-color:#FFFFFF; height:30; width:150">
	</form>
</body>
</html>