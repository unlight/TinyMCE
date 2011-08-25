<?php if (!defined('APPLICATION')) exit();

$PluginInfo['TinyMCE'] = array(
	'Name' => 'TinyMCE',
	'Description' => 'Adapts TinyMCE to work with Garden.',
	'Author' => 'Serenity',
	'AuthorUrl' => 'http://liandri.beyondunreal.com/BR-Serenity',
	'Version' => '1.02',
	'Date' => 'Summer 2011',
	'RegisterPermissions' => array(
		'Plugins.TinyMCE.Wysiwyg.Allow'
	)
);

class TinyMCEPlugin extends Gdn_Plugin {
	
/*	protected static function LocaleLanguageCode() {
		$T = preg_split('/[_-]/', Gdn::Locale()->Current());
		return ArrayValue(0, $T, 'en');
	}*/
	
	public function Base_Render_Before($Sender) {
		if ($Sender->DeliveryType() != DELIVERY_TYPE_ALL) return;
		if (!property_exists($Sender, 'Form')) return;
		if (Gdn::Session()->CheckPermission('Plugins.TinyMCE.Wysiwyg.Allow')) {
			$Sender->AddJsFile('plugins/TinyMCE/vendors/tinymce/jquery.tinymce.js');
			$Sender->AddJsFile('tinymce.functions.js', 'plugins/TinyMCE');
			$Sender->AddCssFile('tinymce.css', 'plugins/TinyMCE/desing');
		}
	}
	
/*	public function PluginController_TestTextarea_Create($Sender) {
		$Sender->AddJsFile('jquery.js');
		$Sender->AddJsFile('jquery.livequery.js');
		$Sender->AddJsFile('plugins/TinyMCE/vendors/tinymce/jquery.tinymce.js');
		$Sender->Form = Gdn::Factory('Form');
		$Sender->View = dirname(__FILE__) . '/test.php';
		$Sender->Title('TestTextarea');
		$Sender->Render();
	}*/
	
	public function Setup() {
	}
}