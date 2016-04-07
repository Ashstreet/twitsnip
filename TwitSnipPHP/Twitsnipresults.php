<?php header('Access-Control-Allow-Origin: *');
require_once('TwitterAPIExchange.php');

$search = $_POST['usersearch'];
 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "OAUTH_ACCESS_TOKEN",
    'oauth_access_token_secret' => "OAUTH_ACCESS_TOKEN_SECRET",
    'consumer_key' => "CONSUMER_KEY",
    'consumer_secret' => "CONSUMER_SECRET"
);

$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
$getfield = '?q='.$search.'&result_type=recent';
$twitter = new TwitterAPIExchange($settings);
$data = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),$assoc = TRUE);
 
// Check for errors
if(isset($data['errors'])) {
    echo '<h3>Sorry, there was a problem.</h3>';
    echo '<p>Twitter returned the following errors:</p>';
 
    foreach ($data['errors'] as $error) {
        echo '<p><em>', $error['message'], '</em></p>';
    }
}
 
// Check there are actually some tweets
if (isset($data['statuses'])) {
    echo '<ul>';
    foreach($data['statuses'] as $tweet) {
        echo $tweet['text'];
        echo '<br />';
       echo('<pre>');
    print_r($tweet);
    echo('</pre>');
    }

    echo '</ul>';
}
?>

