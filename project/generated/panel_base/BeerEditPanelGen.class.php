
<?php

require (__MODEL_CONNECTOR__ . '/BeerConnector.class.php');

/**
 * This is the base class for the the BeerEditPanel class.  It uses the code-generated
 * BeerModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Beer columns.
 *
 * Implement your customizations in the BeerEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class BeerEditPanelGen extends QPanel {
	/** @var BeerConnector */
	public $mctBeer;

	// Controls for Beer's Data Fields

	/** @var QLabel */
	protected $lblId;

	/** @var QTextBox */
	protected $txtDescription;

	/** @var QTextBox */
	protected $txtName;

	/** @var QCheckBox */
	protected $chkActive;

	/** @var QIntegerTextBox */
	protected $txtCervceria;


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

		// Construct the BeerConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctBeer = BeerConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Beer's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctBeer->lblId_Create();
		$this->txtDescription = $this->mctBeer->txtDescription_Create();
		$this->txtName = $this->mctBeer->txtName_Create();
		$this->chkActive = $this->mctBeer->chkActive_Create();
		$this->txtCervceria = $this->mctBeer->txtCervceria_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctBeer->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctBeer->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctBeer->SaveBeer($blnForceUpdate);
	}

	public function Delete() {
		$this->mctBeer->DeleteBeer();
	}

}
