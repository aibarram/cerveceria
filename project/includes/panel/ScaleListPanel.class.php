<?php
require(__PANEL_GEN__ . '/ScaleListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/ScaleList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Scale class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class ScaleListPanel extends ScaleListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/ScaleListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the ScaleList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the ScaleList creates the default columns.

	protected function dtgScales_CreateColumns() {
		$col = $this->dtgScales->CreateNodeColumn("Id", QQN::Scale()->Id);
		$col = $this->dtgScales->CreateNodeColumn("Name", QQN::Scale()->Name);
		$col = $this->dtgScales->CreateNodeColumn("Description", QQN::Scale()->Description);
		$col = $this->dtgScales->CreateNodeColumn("Active", QQN::Scale()->Active);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgScales_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgScales_EditClick'));
			$this->dtgScales->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Scale()->Id, null, false, 0);
			$this->dtgScales->RemoveCssClass('clickable-rows');
		}

		protected function dtgScales_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
