<?
	require_once 'vendor/autoload.php'; 
	$fb = new Facebook\Facebook([
  'app_id' => '436332386788804', // Replace {app-id} with your app id
  'app_secret' => 'copypro',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>