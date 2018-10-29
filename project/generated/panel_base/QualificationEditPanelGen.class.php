
<?php

require (__MODEL_CONNECTOR__ . '/QualificationConnector.class.php');

/**
 * This is the base class for the the QualificationEditPanel class.  It uses the code-generated
 * QualificationModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Qualification columns.
 *
 * Implement your customizations in the QualificationEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class QualificationEditPanelGen extends QPanel {
	/** @var QualificationConnector */
	public $mctQualification;

	// Controls for Qualification's Data Fields

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

		// Construct the QualificationConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctQualification = QualificationConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Qualification's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctQualification->lblId_Create();
		$this->txtName = $this->mctQualification->txtName_Create();
		$this->txtDescription = $this->mctQualification->txtDescription_Create();
		$this->chkActive = $this->mctQualification->chkActive_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctQualification->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctQualification->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctQualification->SaveQualification($blnForceUpdate);
	}

	public function Delete() {
		$this->mctQualification->DeleteQualification();
	}

	// Check for records that may violate Unique Clauses
	public function Validate() {
		$blnToReturn = true;
		if (($this->txtName) && ($objQualification = Qualification::LoadByName($this->txtName->Text)) && ($objQualification->Id != $this->mctQualification->Qualification->Id )){
				$blnToReturn = false;
				$this->txtName->Warning = QApplication::Translate("This value is already in use.");
			}
		return $blnToReturn;
	}
}
