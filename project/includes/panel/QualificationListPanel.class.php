<?php
require(__PANEL_GEN__ . '/QualificationListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/QualificationList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Qualification class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class QualificationListPanel extends QualificationListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/QualificationListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the QualificationList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the QualificationList creates the default columns.

	protected function dtgQualifications_CreateColumns() {
		$col = $this->dtgQualifications->CreateNodeColumn("Id", QQN::Qualification()->Id);
		$col = $this->dtgQualifications->CreateNodeColumn("Name", QQN::Qualification()->Name);
		$col = $this->dtgQualifications->CreateNodeColumn("Description", QQN::Qualification()->Description);
		$col = $this->dtgQualifications->CreateNodeColumn("Active", QQN::Qualification()->Active);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgQualifications_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgQualifications_EditClick'));
			$this->dtgQualifications->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Qualification()->Id, null, false, 0);
			$this->dtgQualifications->RemoveCssClass('clickable-rows');
		}

		protected function dtgQualifications_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
