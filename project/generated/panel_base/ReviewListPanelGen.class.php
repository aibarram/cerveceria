<?php



/**
 * This is the base list class for the  Review class.
 *
 * Do not edit this file, this file is overwritten on any code regenerations. Make any changes you need to the subclass.
 *
 * @package My QCubed Application
 * @subpackage PanelBaseObjects
 */
abstract class ReviewListPanelGen extends QPanel {
	/** @var QPanel **/
	protected $pnlFilter;

	/** @var QTextBox **/
	protected $txtFilter;

	/** @var QPanel **/
	protected $pnlButtons;

	/** @var QButton **/
	protected $btnNew;

	/** @var ReviewList **/
	protected $dtgReviews;


	public function __construct($objParent, $strControlId = null) {
		parent::__construct($objParent, $strControlId);

		$this->CreateFilterPanel();
		$this->dtgReviews_Create();
		$this->dtgReviews->SetDataBinder('BindData', $this);
		$this->CreateButtonPanel();
	}

   /**
	* Creates the data grid and prepares it to be row clickable. Override for additional creation operations.
	**/
	protected function dtgReviews_Create() {
		$this->dtgReviews = new ReviewList($this);
		$this->dtgReviews_CreateColumns();
		$this->dtgReviews_MakeEditable();
		$this->dtgReviews->RowParamsCallback = [$this, "dtgReviews_GetRowParams"];
			$this->dtgReviews->LinkedNode = QQN::Review();
	}

   /**
	* Calls the list connector to add the columns. Override to customize column creation.
	**/
	protected function dtgReviews_CreateColumns() {
		$this->dtgReviews->CreateColumns();
	}

	protected function dtgReviews_MakeEditable() {
		$this->dtgReviews->AddAction(new QCellClickEvent(0, null, null, true), new QAjaxControlAction($this, 'dtgReviews_CellClick', null, null, QCellClickEvent::RowValue));
		$this->dtgReviews->AddCssClass('clickable-rows');
	}

	protected function dtgReviews_CellClick($strFormId, $strControlId, $strParameter) {
		if ($strParameter) {
			$this->EditItem($strParameter);
		}
	}
	public function dtgReviews_GetRowParams($objRowObject, $intRowIndex) {
		$strKey = $objRowObject->PrimaryKey();
		$params['data-value'] = $strKey;
		return $params;
	}

	/**
	 *
	 **/
	protected function CreateFilterPanel() {
		$this->pnlFilter = new QPanel($this);	// div wrapper for filter objects
		$this->pnlFilter->AutoRenderChildren = true;

		$this->txtFilter = new QTextBox($this->pnlFilter);
		$this->txtFilter->Placeholder = QApplication::Translate('Search...');
		$this->txtFilter->TextMode = QTextMode::Search;
		$this->AddFilterActions();
	}

	protected function AddFilterActions() {
		$this->txtFilter->AddAction(new QInputEvent(300), new QAjaxControlAction ($this, 'FilterChanged'));
		$this->txtFilter->AddActionArray(new QEnterKeyEvent(),
			[
				new QAjaxControlAction($this, 'FilterChanged'),
				new QTerminateAction()
			]
		);
	}

	protected function FilterChanged() {
		$this->dtgReviews->Refresh();
	}

	/**
	 *	Bind Data to the list control.
	 **/
	public function BindData() {
		$objCondition = $this->GetCondition();
		$this->dtgReviews->BindData($objCondition);
	}


	/**
	 *  Get the condition for the data binder.
	 *  @return QQCondition;
	 **/
	protected function GetCondition() {
		$strSearchValue = $this->txtFilter->Text;
		$strSearchValue = trim($strSearchValue);

		if (is_null($strSearchValue) || $strSearchValue === '') {
			 return QQ::All();
		} else {
			return QQ::OrCondition(
				QQ::Equal(QQN::Review()->Id, $strSearchValue),
            QQ::Equal(QQN::Review()->Beer, $strSearchValue)
			);
		}

	}



	/**
	 *
	 **/
	protected function CreateButtonPanel() {
		$this->pnlButtons = new QPanel ($this);
		$this->pnlButtons->AutoRenderChildren = true;

		$this->btnNew = new QJqButton ($this->pnlButtons);
		$this->btnNew->Text = QApplication::Translate ('New');
		$this->btnNew->AddAction (new QClickEvent(), new QAjaxControlAction ($this, 'btnNew_Click'));
	}

	protected function btnNew_Click($strFormId, $strControlId, $strParameter) {
		$this->EditItem();
	}

	protected function EditItem ($strKey = null) {
		$strQuery = '';
		if ($strKey) {
			$strQuery =  '?intId=' . $strKey;
		}
		$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORMS__ . '/review_edit.php' . $strQuery;
		QApplication::Redirect ($strEditPageUrl);
	}

}