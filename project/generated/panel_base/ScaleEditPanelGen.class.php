
<?php

require (__MODEL_CONNECTOR__ . '/ScaleConnector.class.php');

/**
 * This is the base class for the the ScaleEditPanel class.  It uses the code-generated
 * ScaleModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Scale columns.
 *
 * Implement your customizations in the ScaleEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class ScaleEditPanelGen extends QPanel {
	/** @var ScaleConnector */
	public $mctScale;

	// Controls for Scale's Data Fields

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

		// Construct the ScaleConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctScale = ScaleConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Scale's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctScale->lblId_Create();
		$this->txtName = $this->mctScale->txtName_Create();
		$this->txtDescription = $this->mctScale->txtDescription_Create();
		$this->chkActive = $this->mctScale->chkActive_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctScale->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctScale->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctScale->SaveScale($blnForceUpdate);
	}

	public function Delete() {
		$this->mctScale->DeleteScale();
	}

}
