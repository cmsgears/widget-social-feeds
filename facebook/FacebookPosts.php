<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\social\feeds\twitter;

//Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\base\Widget;

/**
 * FacebookPosts shows the most recent posts published on FaceBook.
 *
 * @since 1.0.0
 */
class FacebookPosts extends Widget {

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
	public $wrap	= true;

	public $appId;
	public $appSecret;

	/**
	 * Number of tweets to be pulled from Twitter.
	 *
	 * @var integer
	 */
	public $limit	= 5;

	/**
	 * Title to be displayed on top of widget.
	 *
	 * @var string
	 */
	public $title	= null;

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

		// TODO: Add code to collect twitter tweets

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

	// FacebookPostsWidget -------------------

}
