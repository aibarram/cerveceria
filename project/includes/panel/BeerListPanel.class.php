<?php
require(__PANEL_GEN__ . '/BeerListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/BeerList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Beer class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class BeerListPanel extends BeerListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/BeerListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the BeerList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the BeerList creates the default columns.

	protected function dtgBeers_CreateColumns() {
		$col = $this->dtgBeers->CreateNodeColumn("Id", QQN::Beer()->Id);
		$col = $this->dtgBeers->CreateNodeColumn("Description", QQN::Beer()->Description);
		$col = $this->dtgBeers->CreateNodeColumn("Name", QQN::Beer()->Name);
		$col = $this->dtgBeers->CreateNodeColumn("Active", QQN::Beer()->Active);
		$col = $this->dtgBeers->CreateNodeColumn("Cervceria", QQN::Beer()->Cervceria);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgBeers_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgBeers_EditClick'));
			$this->dtgBeers->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Beer()->Id, null, false, 0);
			$this->dtgBeers->RemoveCssClass('clickable-rows');
		}

		protected function dtgBeers_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
