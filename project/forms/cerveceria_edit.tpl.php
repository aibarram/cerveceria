<?php
	// This is the HTML template include file (.tpl.php) for the cerveceria_edit.php
	// Feel free to edit this as needed.

	$strPageTitle = QApplication::Translate('Cerveceria');
	require(__CONFIGURATION__ . '/header.inc.php');
?>
<?php $this->RenderBegin() ?>

<h1><?php _t('Cerveceria')?></h1>

<div class="form-controls">
	<?= _r($this->pnlCerveceria); ?>
</div>

<div class="form-actions">
	<div class="form-save"><?php $this->btnSave->Render(); ?></div>
	<div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
	<div class="form-delete"><?php $this->btnDelete->Render(); ?></div>
</div>

<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php');