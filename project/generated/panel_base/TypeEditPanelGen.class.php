
<?php

require (__MODEL_CONNECTOR__ . '/TypeConnector.class.php');

/**
 * This is the base class for the the TypeEditPanel class.  It uses the code-generated
 * TypeModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Type columns.
 *
 * Implement your customizations in the TypeEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class TypeEditPanelGen extends QPanel {
	/** @var TypeConnector */
	public $mctType;

	// Controls for Type's Data Fields

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

		// Construct the TypeConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctType = TypeConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Type's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctType->lblId_Create();
		$this->txtName = $this->mctType->txtName_Create();
		$this->txtDescription = $this->mctType->txtDescription_Create();
		$this->chkActive = $this->mctType->chkActive_Create();
	}

	/**
	 * @param null|string $strName
	 **/
	public function Load ($strName = null) {
		if (!$this->mctType->Load ($strName)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctType->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctType->SaveType($blnForceUpdate);
	}

	public function Delete() {
		$this->mctType->DeleteType();
	}

	// Check for records that may violate Unique Clauses
	public function Validate() {
		$blnToReturn = true;
		if (($this->lblId) && ($objType = Type::LoadById($this->lblId->Text)) && ($objType->Name != $this->mctType->Type->Name )){
				$blnToReturn = false;
				$this->lblId->Warning = QApplication::Translate("This value is already in use.");
			}
		return $blnToReturn;
	}
}
