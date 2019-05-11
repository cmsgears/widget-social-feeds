<?php
$autoloadApp		= $widget->autoloadApp;
$autoloadController = $widget->autoloadController;
$autoloadAction		= $widget->autoloadAction;
$autoloadUrl		= $widget->autoloadUrl;
?>
<div class="wrap-autoloader">
	<div class="autoloader autoloader-social-feeds autoloader-social-feeds-instagram" cmt-app="<?= $autoloadApp ?>" cmt-controller="<?= $autoloadController ?>" cmt-action="<?= $autoloadAction ?>" action="<?= $autoloadUrl ?>">
		<div class="max-area-cover spinner">
			<div class="valign-center fa fa-circle-o-notch fa-4x fa-spin"></div>
		</div>
		<input type="hidden" name="widgetId" value="social-feeds-instagram" />
		<input type="hidden" name="widgetClass" value="cmsgears\widgets\social\feeds\instagram\InstagramPosts" />
		<span class="cmt-click"></span>
	</div>
</div>
