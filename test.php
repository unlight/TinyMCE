<?php if (!defined('APPLICATION')) exit(); 


$UploadOptions = array('UploadTo' => 'news/'.date('Y'));
?>

<h1><?php echo $this->Data('Title'); ?></h1>

<?php echo $this->Form->Open(array('enctype' => 'multipart/form-data')); ?>
<?php echo $this->Form->Errors(); ?>

<ul>

<li>
<?php 
echo $this->Form->Label('Body', 'Body', array('class' => 'ForWide'));
echo $this->Form->TextBox('Body', array('Multiline' => True));
?>
</li>

</ul>

<?php 
echo $this->Form->Button('Save');
echo $this->Form->Close(); 
?>
