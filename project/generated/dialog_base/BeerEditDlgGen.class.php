<?php

include (__PANEL__ . '/BeerEditPanel.class.php');

/**
 * This is the BeerEditDlgGen class.  It uses the code-generated
 * BeerEditPanel class, which has all the controls for editing
 * a record in the beer table.
 *
 *
 * @package My QCubed Application
 * @subpackage Dialogs
 */
class BeerEditDlgGen extends QDialog {

	/** @var BeerEditPanel  */
	protected $pnlBeer;

	/**
	 * @param QForm|QControl $objParentObject
	 * @param null|string $strControlId
	 * @throws Exception
	 * @throws QCallerException
	 */
	public function __construct($objParentObject = null, $strControlId = null) {
		try {
			parent::__construct($objParentObject, $strControlId);
		} catch (QCallerException $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}

		$this->pnlBeer = new BeerEditPanel($this);
		$this->CreateButtons();
	}

	/**
	 * Create the buttons at the bottom of the dialog.
	 */
	protected function CreateButtons() {
		// Create Buttons
		$this->AddButton(QApplication::Translate('Save'), 'save', true, true, null, array('class'=>'ui-priority-primary'));
		$this->AddButton(QApplication::Translate('Cancel'), 'cancel');
		$this->AddButton(QApplication::Translate('Delete'), 'delete', false, false,
			sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Beer')),
			array('class'=>'ui-button-left')
		);
		$this->AddAction(new QDialog_ButtonEvent(0, null, null, true), new QAjaxControlAction($this, 'ButtonClick'));
	}

	/**
	 * Load the dialog using primary keys.
	 *
	 * @param null|integer $intId
	 */
	public function Load ($intId = null) {
		$this->pnlBeer->Load($intId);
		$blnIsNew = is_null($intId);
		$this->ShowHideButton ('delete', !$blnIsNew);	// show delete button if editing a previous record.

		if ($blnIsNew) {
			$strTitle = QApplication::Translate('New') . ' ';
		} else {
			$strTitle = QApplication::Translate('Edit') . ' ';
		};
		$strTitle .= 'Beer';
		$this->Title = $strTitle;
	}


	/**
	 * A button was clicked. Override to do something different than the default or process further.
	 * @param string $strFormId
	 * @param string $strControlId
	 * @param mixed $strParameter
	 */

	public function ButtonClick($strFormId, $strControlId, $strParameter) {
		switch ($strParameter) {
			case 'save':
				$this->Save();
				break;

			case 'delete':
				$this->pnlBeer->Delete();
                $this->Close();
				break;

			case 'cancel':
                $this->Close();
                break;
		}
	}

   /**
    * Process a click on the Save button.
    */
    protected function Save() {
        try {
		    $this->pnlBeer->Save();
        }
        catch (QOptimisticLockingException $e) {
            $dlg = QDialog::Alert (
                QApplication::Translate("Another user has changed the information while you were editing it. Would you like to overwrite their changes, or refresh the page and try editing again?"),
                ["Refresh", "Overwrite"]);
            $dlg->AddAction(new QDialog_ButtonEvent(0, null, null, true), new QAjaxControlAction($this, "dlgOptimisticLocking_ButtonEvent"));
            return;
        }
        $this->Close();
	}

   /**
    * An optimistic lock exception has fired and we have put a dialog on the screen asking the user what they want to do.
    * The user can either overwrite the data, or refresh and start the edit process over.
    *
    * @param string $strFormId      The form id
    * @param string $strControlId   The control id of the dialog
    * @param string $btn            The text on the button
    */
    protected function dlgOptimisticLocking_ButtonEvent($strFormId, $strControlId, $btn) {
        if ($btn == "Overwrite") {
            $this->pnlBeer->Save(true);
            $this->Form->GetControl($strControlId)->Close();
            $this->Close();
        } else { // Refresh
            $this->Form->GetControl($strControlId)->Close();
            $this->pnlBeer->Refresh(true);
        }
    }

}
