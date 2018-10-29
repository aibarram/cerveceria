<?php
require(__PANEL_GEN__ . '/TypeListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/TypeList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Type class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class TypeListPanel extends TypeListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/TypeListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the TypeList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the TypeList creates the default columns.

	protected function dtgTypes_CreateColumns() {
		$col = $this->dtgTypes->CreateNodeColumn("Id", QQN::Type()->Id);
		$col = $this->dtgTypes->CreateNodeColumn("Name", QQN::Type()->Name);
		$col = $this->dtgTypes->CreateNodeColumn("Description", QQN::Type()->Description);
		$col = $this->dtgTypes->CreateNodeColumn("Active", QQN::Type()->Active);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgTypes_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgTypes_EditClick'));
			$this->dtgTypes->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Type()->Id, null, false, 0);
			$this->dtgTypes->RemoveCssClass('clickable-rows');
		}

		protected function dtgTypes_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
