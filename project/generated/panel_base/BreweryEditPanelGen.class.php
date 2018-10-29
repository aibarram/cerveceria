
<?php

require (__MODEL_CONNECTOR__ . '/BreweryConnector.class.php');

/**
 * This is the base class for the the BreweryEditPanel class.  It uses the code-generated
 * BreweryModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Brewery columns.
 *
 * Implement your customizations in the BreweryEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class BreweryEditPanelGen extends QPanel {
	/** @var BreweryConnector */
	public $mctBrewery;

	// Controls for Brewery's Data Fields

	/** @var QLabel */
	protected $lblId;

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

		// Construct the BreweryConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctBrewery = BreweryConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Brewery's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctBrewery->lblId_Create();
		$this->txtName = $this->mctBrewery->txtName_Create();
		$this->txtDescription = $this->mctBrewery->txtDescription_Create();
		$this->chkActive = $this->mctBrewery->chkActive_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctBrewery->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctBrewery->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctBrewery->SaveBrewery($blnForceUpdate);
	}

	public function Delete() {
		$this->mctBrewery->DeleteBrewery();
	}

}
