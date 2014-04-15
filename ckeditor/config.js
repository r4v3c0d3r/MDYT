/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
	config.language = 'cs';
	config.uiColor = '#BB2222';
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [{
		groups : ['undo']
	}, {
		name : 'links'
	}, {
		name : 'others'
	}];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript,Anchor';

	// Se the most common block elements.
	config.format_tags = 'div;p;h1;h2;h3;h4;h5;h6';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	//load CSS parser

	config.extraPlugins = 'stylesheetparser';
	config.contentsCss = 'CSS/CKEstyle.css';
	config.stylesSet = [];

	config.enterMode = CKEDITOR.ENTER_BR;

};
