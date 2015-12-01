<?php
namespace cmsgears\widgets\twitter\tweets; 

use TwitterOAuth\Auth\SingleUserAuth;

/**
 * Serializer Namespace
 */
use TwitterOAuth\Serializer\ArraySerializer;
 
/**
 * The TweetsWidget widget can be used to embed ajaxified login form within the view.
 */
class TweetsWidget extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------
 

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();

		// Do init tasks
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

	/**
	 * @inheritdoc
	 */
    public function run() {
    	
		$this->authenticate();
    }
	
	// Authenticate
	
	public function authenticate() {
		
		/**
		 * Array with the OAuth tokens provided by Twitter
		 *   - consumer_key        Twitter API key
		 *   - consumer_secret     Twitter API secret
		 *   - oauth_token         Twitter Access token         * Optional For GET Calls
		 *   - oauth_token_secret  Twitter Access token secret  * Optional For GET Calls
		 */
    	
		$credentials = array(
		    'consumer_key' => 'Lk9hAGCzZ6bKTP3dmI2UHGqyB',
		    'consumer_secret' => 'dRNmJP5WkHQZ8QmPT3WoM25sAG6SZdwJG5JnyRc5geLE5hY9sx',
		    'oauth_token' => '2186032518-WknupkqmLuF1dpZyMZSryqW64Ng4brQLR3ucds5',
		    'oauth_token_secret' => 'YM6a1z4FGCpOgvs4yh3SPUi1AYlEQQ1HW95jLLUlMcOeq',
		); 
		
		/**
		 * Instantiate SingleUser
		 *
		 * For different output formats you can set one of available serializers
		 * (Array, Json, Object, Text or a custom one)
		 */
		
		$auth = new SingleUserAuth($credentials, new ArraySerializer());
		
		/**
		 * Returns a collection of the most recent Tweets posted by the user
		 * https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
		 */
		
		$params = array(
		    'screen_name' => 'Dharmen89390541',
		    'count' => 3,
		    'exclude_replies' => true
		);
		
		/**
		 * Send a GET call with set parameters
		 */
		$response = $auth->get('statuses/user_timeline', $params);
		
		echo '<pre>'; print_r($auth->getHeaders()); echo '</pre>';
		
		echo '<pre>'; print_r($response); echo '</pre><hr />'; 
		
	}
 
}

?>