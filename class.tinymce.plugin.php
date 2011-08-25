<?php if (!defined('APPLICATION')) exit();

$PluginInfo['TinyMCE'] = array(
	'Name' => 'TinyMCE',
	'Description' => 'Adapts TinyMCE to work with Garden.',
	'Author' => 'Serenity',
	'AuthorUrl' => 'http://liandri.beyondunreal.com/BR-Serenity',
	'Version' => '1.00',
	'Date' => 'Summer 2011'
);

class TinyMCEPlugin extends Gdn_Plugin {
	
/*	protected static function LocaleLanguageCode() {
		$T = preg_split('/[_-]/', Gdn::Locale()->Current());
		return ArrayValue(0, $T, 'en');
	}*/
	
	public function Base_Render_Before($Sender) {
		if ($Sender->DeliveryType() != DELIVERY_TYPE_ALL) return;
		
/*		$Session = Gdn::Session();
		if ($Session->CheckPermission('Plugins.ElRte.Wysiwyg.Allow')) {
			$Sender->AddDefinition('LocaleLanguageCode', self::LocaleLanguageCode());
			
			if ($Session->CheckPermission('Plugins.ElRte.FileManager.Allow')) {
				$Sender->AddDefinition('FileManagerAllow', 1);
			}
			$Sender->AddJsFile('plugins/elRTE/vendors/dowhen/jquery.dowhen.min.js');
			$Sender->AddJsFile('plugins/elRTE/elrte.functions.js');
			$Sender->AddCssFile('plugins/elRTE/design/elrte.plugin.css');
		}*/

	}
	
	public function PluginController_TestTextarea_Create($Sender) {
		$Sender->AddJsFile('jquery.js');
		$Sender->AddJsFile('jquery.livequery.js');
		
		$Sender->AddJsFile('tinymce.functions.js', 'plugins/TinyMCE');
		$Sender->AddCssFile('tinymce.css', 'plugins/TinyMCE/desing');
		
		// TODO: LOAD FROM JS
		$Sender->AddJsFile('plugins/TinyMCE/vendors/tinymce/jquery.tinymce.js');
		
		$Sender->Form = Gdn::Factory('Form');
		$Sender->View = dirname(__FILE__) . '/test.php';
		$Sender->Title('TestTextarea');
		$Sender->Render();
	}
	
	public function Setup() {
	}
}