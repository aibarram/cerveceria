<?php
require(__PANEL_GEN__ . '/BreweryListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/BreweryList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Brewery class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class BreweryListPanel extends BreweryListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/BreweryListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the BreweryList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the BreweryList creates the default columns.

	protected function dtgBreweries_CreateColumns() {
		$col = $this->dtgBreweries->CreateNodeColumn("Id", QQN::Brewery()->Id);
		$col = $this->dtgBreweries->CreateNodeColumn("Name", QQN::Brewery()->Name);
		$col = $this->dtgBreweries->CreateNodeColumn("Description", QQN::Brewery()->Description);
		$col = $this->dtgBreweries->CreateNodeColumn("Active", QQN::Brewery()->Active);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgBreweries_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgBreweries_EditClick'));
			$this->dtgBreweries->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Brewery()->Id, null, false, 0);
			$this->dtgBreweries->RemoveCssClass('clickable-rows');
		}

		protected function dtgBreweries_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
