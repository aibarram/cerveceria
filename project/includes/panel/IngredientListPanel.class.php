<?php
require(__PANEL_GEN__ . '/IngredientListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/IngredientList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Ingredient class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class IngredientListPanel extends IngredientListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/IngredientListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the IngredientList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the IngredientList creates the default columns.

	protected function dtgIngredients_CreateColumns() {
		$col = $this->dtgIngredients->CreateNodeColumn("Id", QQN::Ingredient()->Id);
		$col = $this->dtgIngredients->CreateNodeColumn("Name", QQN::Ingredient()->Name);
		$col = $this->dtgIngredients->CreateNodeColumn("Description", QQN::Ingredient()->Description);
		$col = $this->dtgIngredients->CreateNodeColumn("Active", QQN::Ingredient()->Active);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgIngredients_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgIngredients_EditClick'));
			$this->dtgIngredients->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Ingredient()->Id, null, false, 0);
			$this->dtgIngredients->RemoveCssClass('clickable-rows');
		}

		protected function dtgIngredients_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
