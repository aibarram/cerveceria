
<?php

require (__MODEL_CONNECTOR__ . '/IngredientConnector.class.php');

/**
 * This is the base class for the the IngredientEditPanel class.  It uses the code-generated
 * IngredientModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Ingredient columns.
 *
 * Implement your customizations in the IngredientEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class IngredientEditPanelGen extends QPanel {
	/** @var IngredientConnector */
	public $mctIngredient;

	// Controls for Ingredient's Data Fields

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

		// Construct the IngredientConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctIngredient = IngredientConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Ingredient's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctIngredient->lblId_Create();
		$this->txtName = $this->mctIngredient->txtName_Create();
		$this->txtDescription = $this->mctIngredient->txtDescription_Create();
		$this->chkActive = $this->mctIngredient->chkActive_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctIngredient->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctIngredient->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctIngredient->SaveIngredient($blnForceUpdate);
	}

	public function Delete() {
		$this->mctIngredient->DeleteIngredient();
	}

	// Check for records that may violate Unique Clauses
	public function Validate() {
		$blnToReturn = true;
		if (($this->txtName) && ($objIngredient = Ingredient::LoadByName($this->txtName->Text)) && ($objIngredient->Id != $this->mctIngredient->Ingredient->Id )){
				$blnToReturn = false;
				$this->txtName->Warning = QApplication::Translate("This value is already in use.");
			}
		return $blnToReturn;
	}
}
