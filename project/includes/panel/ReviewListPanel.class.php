<?php
require(__PANEL_GEN__ . '/ReviewListPanelGen.class.php');
require(__MODEL_CONNECTOR__ . '/ReviewList.class.php');

/**
 * This is the customizable subclass for the list panel functionality
 * of the Review class.
 *
 * This file is intended to be modified. Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage Panels
 *
 */
class ReviewListPanel extends ReviewListPanelGen {
	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		/**
		 * Default is just to render everything generic. Comment out the AutoRenderChildren line, and uncomment the
		 * template line to use a template for greater customization of how the panel draws its contents.
		 **/
		$this->AutoRenderChildren = true;
		//$this->Template =  __PANEL_GEN__ . '/ReviewListPanel.tpl.php';
	}

/*
	 Uncomment this block to directly create the columns here, rather than creating them in the ReviewList connector.
	 You can then modify the column creation process by editing the function below. Or, you can instead call the parent function 
	 and modify the columns after the ReviewList creates the default columns.

	protected function dtgReviews_CreateColumns() {
		$col = $this->dtgReviews->CreateNodeColumn("Id", QQN::Review()->Id);
		$col = $this->dtgReviews->CreateNodeColumn("Beer", QQN::Review()->Beer);
	}

*/	
		
/*
	 Uncomment this block to use an Edit column instead of clicking on a highlighted row in order to edit an item.

		protected $pxyEditRow;

		protected function dtgReviews_MakeEditable () {
			$this->>pxyEditRow = new QControlProxy($this);
			$this->>pxyEditRow->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtgReviews_EditClick'));
			$this->dtgReviews->CreateLinkColumn(QApplication::Translate('Edit'), QApplication::Translate('Edit'), $this->>pxyEditRow, QQN::Review()->Id, null, false, 0);
			$this->dtgReviews->RemoveCssClass('clickable-rows');
		}

		protected function dtgReviews_EditClick($strFormId, $strControlId, $param) {
			$this->EditItem($param);
		}
*/	



}
