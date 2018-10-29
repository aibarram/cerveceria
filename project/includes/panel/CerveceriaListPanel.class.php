<?php
require(__PANEL_GEN__ . '/CerveceriaListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/CerveceriaList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Cerveceria class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class CerveceriaListPanel extends CerveceriaListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/CerveceriaListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the CerveceriaList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the CerveceriaList creates the default columns.

	protected function dtgCervecerias_CreateColumns() {
		$col = $this->dtgCervecerias->CreateNodeColumn("Id", QQN::Cerveceria()->Id);
		$col = $this->dtgCervecerias->CreateNodeColumn("Name", QQN::Cerveceria()->Name);
		$col = $this->dtgCervecerias->CreateNodeColumn("Description", QQN::Cerveceria()->Description);
		$col = $this->dtgCervecerias->CreateNodeColumn("Active", QQN::Cerveceria()->Active);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgCervecerias_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgCervecerias_EditClick'));
			$this->dtgCervecerias->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Cerveceria()->Id, null, false, 0);
			$this->dtgCervecerias->RemoveCssClass('clickable-rows');
		}

		protected function dtgCervecerias_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
