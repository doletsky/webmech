<?
define('ACCESS_TOKEN', '0c70c20d668015042f6b01bc5e7ccb513065c0bb49e4f763fcad7fc204e97e842df0842206a6186259293');

function api($method, $params = array())
{
    $params['access_token'] = ACCESS_TOKEN;

    $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);
    $response = file_get_contents($url);
    return json_decode($response, true);
}

$api = api('video.get', array(
    'videos' => '683028574_456239018', 'v'=>'5.131'
));
?><pre><?
print_r($api);
?></pre>
<!---->
<!--</body>-->
<!--</html>-->

