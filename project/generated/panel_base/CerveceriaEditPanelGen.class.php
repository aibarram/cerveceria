
<?php

require (__MODEL_CONNECTOR__ . '/CerveceriaConnector.class.php');

/**
 * This is the base class for the the CerveceriaEditPanel class.  It uses the code-generated
 * CerveceriaModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Cerveceria columns.
 *
 * Implement your customizations in the CerveceriaEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class CerveceriaEditPanelGen extends QPanel {
	/** @var CerveceriaConnector */
	public $mctCerveceria;

	// Controls for Cerveceria's Data Fields

	/** @var QIntegerTextBox */
	protected $txtId;

	/** @var QTextBox */
	protected $txtName;

	/** @var QTextBox */
	protected $txtDescription;

	/** @var QCheckBox */
	protected $chkActive;


	/**
	 * @param QForm|QControl $objParentObject
	 * @param null|string $strControlId
	 * @throws Exception
	 * @throws QCallerException
	 */
	public function __construct($objParentObject, $strControlId = null) {
		// Call the Parent
		try {
			parent::__construct($objParentObject, $strControlId);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}

		// Construct the CerveceriaConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctCerveceria = CerveceriaConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Cerveceria's data fields
	 **/
	protected function CreateObjects() {
		$this->txtId = $this->mctCerveceria->txtId_Create();
		$this->txtName = $this->mctCerveceria->txtName_Create();
		$this->txtDescription = $this->mctCerveceria->txtDescription_Create();
		$this->chkActive = $this->mctCerveceria->chkActive_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctCerveceria->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctCerveceria->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctCerveceria->SaveCerveceria($blnForceUpdate);
	}

	public function Delete() {
		$this->mctCerveceria->DeleteCerveceria();
	}

}
