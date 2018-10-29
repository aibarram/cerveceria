<?php
// Load the QCubed Development Framework
require('../qcubed.inc.php');

require(__PANEL__ . '/ScaleEditPanel.class.php');

/**
 * This is a draft QForm object to do Create, Edit, and Delete functionality
 * of the Scale class.  It uses the code-generated
 * ScaleConnector class, which has methods to help with
 * easily creating/defining controls to modify the fields of Scale columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * @property-read string $ObjectName         The name of the object we are editing
 * @property-read string $ObjectNamePlural   The plural name of the object we are editing
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ScaleEditForm extends QForm {

	/** @var ScaleEditPanel  */
	protected $pnlScale;

	/** @var QJqButton  */
	protected $btnSave;
	/** @var QJqButton  */
	protected $btnCancel;
	/** @var QJqButton  */
	protected $btnDelete;

    /** @var string */
    protected $strObjectName;
    /** @var string */
    protected $strObjectNamePlural;


	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

//	protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

        $this->strObjectName = QApplication::Translate('Scale');
        $this->strObjectNamePlural = QApplication::Translate('Scales');

        $this->pnlScale = new ScaleEditPanel($this);
		$intId = QApplication::QueryString('intId');
	    $this->pnlScale->Load($intId);
		$this->CreateButtons();
	}

	/**
	 * Create the buttons at the bottom of the dialog.
	 */
	protected function CreateButtons() {
		// Create Buttons and Actions on this Form
		$this->btnSave = new QJqButton($this);
		$this->btnSave->Text = QApplication::Translate('Save');
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;

		$this->btnCancel = new QJqButton($this);
		$this->btnCancel->Text = QApplication::Translate('Cancel');
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

		$this->btnDelete = new QJqButton($this);
		$this->btnDelete->Text = QApplication::Translate('Delete');
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Scale'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->pnlScale->mctScale->EditMode;
	}

	// Button Event Handlers
   /**
    * Process a click on the Save button.
    *
    * @param $strFormId
    * @param $strControlId
    * @param $strParameter
    */
    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        try {
		    $this->pnlScale->Save();
        }
        catch (QOptimisticLockingException $e) {
            $dlg = QDialog::Alert (
                QApplication::Translate("Another user has changed the information while you were editing it. Would you like to overwrite their changes, or refresh the page and try editing again?"),
                ["Refresh", "Overwrite"]);
            $dlg->AddAction(new QDialog_ButtonEvent(0, null, null, true), new QAjaxAction("dlgOptimisticLocking_ButtonEvent"));
            return;
        }
		$this->RedirectToListPage();
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
            $this->pnlScale->Save(true);
            $this->GetControl($strControlId)->Close();
            $this->RedirectToListPage();
        } else { // Refresh
            $this->GetControl($strControlId)->Close();
            $this->pnlScale->Refresh(true);
        }
    }

   /**
    * Process a click of the delete button.
    *
    * @param string $strFormId      The form id
    * @param string $strControlId   The control id of the dialog
    * @param string $strParameter   The control parameter, not used
    */
	protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
		$this->pnlScale->Delete();
		$this->RedirectToListPage();
	}

   /**
    * Process a click of the cancel button.
    *
    * @param string $strFormId      The form id
    * @param string $strControlId   The control id of the dialog
    * @param string $strParameter   The control parameter, not used
    */
	protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->RedirectToListPage();
	}

   /**
    * The user has pressed one of the buttons, and now wants to go back to the list page.
    * Override this if you have another way of going to the list page.
    *
    * @param string $strFormId      The form id
    * @param string $strControlId   The control id of the dialog
    * @param string $strParameter   The control parameter, not used
    */
	protected function RedirectToListPage() {
		QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORMS__ . '/scale_list.php',
            false); // Putting false here is important to preventing an optimistic locking exception as a result of the user pressing the back button on the browser
	}

    /**
     * PHP __get magic method implementation
     * @param string $strName Name of the property
     *
     * @return mixed
     * @throws QCallerException
     */
    public function __get($strName) {
        switch ($strName) {
            case "ObjectName": return $this->strObjectName;
            case "ObjectNamePlural": return $this->strObjectNamePlural;

            default:
                try {
                    return parent::__get($strName);
                } catch (QCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// scale_edit.tpl.php as the included HTML template file
ScaleEditForm::Run('ScaleEditForm');
