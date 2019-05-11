<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\social\feeds\instagram;

//Yii Imports
use yii\helpers\Html;

/**
 * InstagramPosts shows the most recent posts of an user, published on Instagram.
 *
 * @since 1.0.0
 */
class InstagramPosts extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	/**
	 * @inheritdoc
	 */
	public $wrap = true;

	/**
	 * @inheritdoc
	 */
	public $options = [ 'id' => 'social-feeds-instagram' ];

	/**
	 * Instgram Access Token is required to show posts.
	 *
	 * @var string
	 */
	public $accessToken;

	/**
	 * Number of posts to be pulled from Instagram.
	 *
	 * @var integer
	 */
	public $limit = 5;

	/**
	 * Title to be displayed on top of widget.
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * @inheritdoc
	 */
	public $autoloadUrl = 'core/autoload/instagram';

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// cmsgears\core\common\base\Widget

	/**
	 * @inheritdoc
	 */
	public function renderWidget( $config = [] ) {

		$posts		= [];
		$postsHtml	= [];

		$singlePath		= "$this->template/single";
		$wrapperView	= "$this->template/wrapper";

		// Silent return in absence of access token
		if( !isset( $this->accessToken ) ) {

			return;
		}

		// Generate Link
		$accessLink = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$this->accessToken}&count={$this->limit}";

		// Query JSON
		$json = @file_get_contents( $accessLink );

		// Decode JSON
		$result = json_decode( preg_replace( '/("\w+"):(\d+)/', '\\1:"\\2"', $json ), true );

		// Collect Posts
		if( $json !== false && isset( $result[ 'data' ] ) ) {

			$data = $result[ 'data' ];

			foreach( $data as $post ) {

				$thumb	= $post[ 'images' ][ 'thumbnail' ][ 'url' ];
				$url	= $post[ 'link' ];

				$posts[] = [ 'img' => $thumb, 'url' => $url ];
			}
		}

		// Render Posts
		foreach( $posts as $post ) {

			$postsHtml[] = $this->render( $singlePath, [ 'post' => $post, 'widget' => $this ] );
		}

		$postsHtml	= implode( '', $postsHtml );
		$postsHtml	= $this->render( $wrapperView, [ 'postsHtml' => $postsHtml, 'widget' => $this ] );

		if( $this->wrap ) {

			return Html::tag( $this->wrapper, $postsHtml, $this->options );
		}

		return $postsHtml;
	}

	// InstagramPostsWidget -----------------

}
