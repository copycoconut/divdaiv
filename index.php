<?
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '436332386788804',
  'app_secret' => '8dbfb4cad4b4bad666dfa4ea7306538a',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', '{access-token}');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();
Complete documentation, installation instructions, and examples are available here.

Tests
Composer is a prerequisite for running the tests. Install composer globally, then run composer install to install required files.
Create a test app on Facebook Developers, then create tests/FacebookTestCredentials.php from tests/FacebookTestCredentials.php.dist and edit it to add your credentials.
The tests can be executed by running this command from the root directory:
$ ./vendor/bin/phpunit
By default the tests will send live HTTP requests to the Graph API. If you are without an internet connection you can skip these tests by excluding the integration group.

$ ./vendor/bin/phpunit --exclude-group integration
?>