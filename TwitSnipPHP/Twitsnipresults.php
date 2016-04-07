<?php header('Access-Control-Allow-Origin: *');
require_once('TwitterAPIExchange.php');

$search = $_POST['usersearch'];
 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "23980715-chcM7OOeCvcpSoOLFoANxOWK0IN30Q0c1pWDxKGWS",
    'oauth_access_token_secret' => "YqX4X2eHvCGNPRrQVCQM9AY5U5OTa9VsS2jA0VBsLCbPA",
    'consumer_key' => "0HLRQkQg5QziC6n5Iszt9TKQU",
    'consumer_secret' => "PJfLM8fHbESrD6wPSeQhaNu7Sx0CUkHq75fw1mGNTy0B6iAy7g"
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

