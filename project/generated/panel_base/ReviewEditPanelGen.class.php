
<?php

require (__MODEL_CONNECTOR__ . '/ReviewConnector.class.php');

/**
 * This is the base class for the the ReviewEditPanel class.  It uses the code-generated
 * ReviewModelConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of a Review columns.
 *
 * Implement your customizations in the ReviewEditPanel.class.php file, not here.
 * This file is overwritten every time you do a code generation, so any changes you make here will be lost.
 *
 * @package My QCubed Application
 */
class ReviewEditPanelGen extends QPanel {
	/** @var ReviewConnector */
	public $mctReview;

	// Controls for Review's Data Fields

	/** @var QLabel */
	protected $lblId;

	/** @var QIntegerTextBox */
	protected $txtBeer;


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

		// Construct the ReviewConnector
		// MAKE SURE we specify "$this" as the Connector's (and thus all subsequent controls') parent
		$this->mctReview = ReviewConnector::Create($this);

		$this->CreateObjects();
	}

	/**
	 * Call ModelConnector's methods to create QControls based on Review's data fields
	 **/
	protected function CreateObjects() {
		$this->lblId = $this->mctReview->lblId_Create();
		$this->txtBeer = $this->mctReview->txtBeer_Create();
	}

	/**
	 * @param null|integer $intId
	 **/
	public function Load ($intId = null) {
		if (!$this->mctReview->Load ($intId)) {
			QApplication::DisplayAlert(QApplication::Translate('Could not load the record. Perhaps it was deleted? Try again.'));
		}
	}


	/**
     * Refresh the objects in the panel, optionally loading from saved data in the database.
     *
     * @param boolean $blnReload
	 **/
	public function Refresh ($blnReload = false) {
        $this->mctReview->Refresh($blnReload);
	}


	public function Save($blnForceUpdate = false) {
		$this->mctReview->SaveReview($blnForceUpdate);
	}

	public function Delete() {
		$this->mctReview->DeleteReview();
	}

}
