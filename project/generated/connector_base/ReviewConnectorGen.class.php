<?php
	/**
	 * This is a ModelConnector class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Review class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Review object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ReviewConnector
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage ModelConnector
	 * @property-read Review $Review the actual Review data class being edited
	 * @property-read QLabel $IdLabel
	 * @property QIntegerTextBox $BeerControl
	 * @property-read QLabel $BeerLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ReviewConnectorGen extends QBaseClass {
		// General Variables
		/**
		 * @var Review objReview
		 * @access protected
		 */
		protected $objReview;
		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;
		/**
		 * @var string strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;
		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that correspond to Review's individual data fields
		/**
		 * @var QLabel lblId
		 * @access protected
		 */
		protected $lblId;

		/**
		 * @var QIntegerTextBox txtBeer

		 * @access protected
		 */
		protected $txtBeer;

		/**
		 * @var QLabel lblBeer
		 * @access protected
		 */
		protected $lblBeer;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ReviewConnector to edit a single Review object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Review object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReviewConnector
		 * @param Review $objReview new or existing Review object
		 */
		 public function __construct($objParentObject, Review $objReview) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ReviewConnector)
			$this->objParentObject = $objParentObject;

			// Setup linked Review object
			$this->objReview = $objReview;

			// Figure out if we're Editing or Creating New
			if ($this->objReview->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to
		 * edit, or if we are also allowed to create a new one, etc.
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReviewConnector
		 * @param null|integer $intId primary key value
		 * @param integer $intCreateType rules governing Review object creation - defaults to CreateOrEdit
 		 * @return ReviewConnector
		 * @throws QCallerException
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objReview = Review::Load($intId);

				// Review was found -- return it!
				if ($objReview)
					return new ReviewConnector($objParentObject, $objReview);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QModelConnectorCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Review object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QModelConnectorCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ReviewConnector($objParentObject, new Review());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReviewConnector
		 * @param integer $intCreateType rules governing Review object creation - defaults to CreateOrEdit
		 * @return ReviewConnector
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ReviewConnector::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ReviewConnector
		 * @param integer $intCreateType rules governing Review object creation - defaults to CreateOrEdit
		 * @return ReviewConnector
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ReviewConnector::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 *
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			$this->lblId->PreferredRenderMethod = 'RenderWithName';
			$this->lblId->LinkedNode = QQN::Review()->Id;
			$this->lblId->Text =  $this->blnEditMode ? $this->objReview->Id : QApplication::Translate('N\A');
			return $this->lblId;
		}



		/**
		 * Create and setup a QIntegerTextBox txtBeer
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtBeer_Create($strControlId = null) {
			$this->txtBeer = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtBeer->Name = QApplication::Translate('Beer');
			$this->txtBeer->Required = true;
			$this->txtBeer->PreferredRenderMethod = 'RenderWithName';
			$this->txtBeer->LinkedNode = QQN::Review()->Beer;
			$this->txtBeer->Text = $this->objReview->Beer;
			return $this->txtBeer;
		}

		/**
		 * Create and setup QLabel lblBeer
		 *
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBeer_Create($strControlId = null) {
			$this->lblBeer = new QLabel($this->objParentObject, $strControlId);
			$this->lblBeer->Name = QApplication::Translate('Beer');
			$this->lblBeer->PreferredRenderMethod = 'RenderWithName';
			$this->lblBeer->LinkedNode = QQN::Review()->Beer;
			$this->lblBeer->Text = $this->objReview->Beer;
			return $this->lblBeer;
		}





		/**
		 * Refresh this ModelConnector with Data from the local Review object.
		 * @param boolean $blnReload reload Review from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			assert($this->objReview); // Notify in development version
			if (!($this->objReview)) return; // Quietly fail in production

			if ($blnReload) {
				$this->objReview->Reload();
			}
			if ($this->lblId) $this->lblId->Text =  $this->blnEditMode ? $this->objReview->Id : QApplication::Translate('N\A');


			if ($this->txtBeer) $this->txtBeer->Text = $this->objReview->Beer;
			if ($this->lblBeer) $this->lblBeer->Text = $this->objReview->Beer;


		}

		/**
		 * Load this ModelConnector with a Review object. Returns the object found, or null if not
		 * successful. The primary reason for failure would be that the key given does not exist in the database. This
		 * might happen due to a programming error, or in a multi-user environment, if the record was recently deleted.
		 * @param null|integer $intId
		 * @param $objClauses
		 * @return null|Review
		 */
		 public function Load($intId = null, $objClauses = null) {
			if (!is_null($intId)) {
				$this->objReview = Review::Load($intId, $objClauses);
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			}
			else {
				$this->objReview = new Review();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
			if ($this->objReview) {
				$this->Refresh ();
			}
			return $this->objReview;
		}
		 



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC REVIEW OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		* This will update this object's Review instance,
		* updating only the fields which have had a control created for it.
		*/
		public function UpdateReview() {
			try {
				// Update any fields for controls that have been created

				if ($this->txtBeer) $this->objReview->Beer = $this->txtBeer->Text;


				// Update any UniqueReverseReferences for controls that have been created for it

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}


		/**
		 * This will save this object's Review instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveReview($blnForceUpdate = false) {
			try {
				$this->UpdateReview();
                $id = $this->objReview->Save(false, $blnForceUpdate);

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			return $id;
		}

		/**
		 * This will DELETE this object's Review instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteReview() {
			$this->objReview->Delete();
		}



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General ModelConnectorVariables
				case 'Review': return $this->objReview;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Review fields -- will be created dynamically if not yet created
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'BeerControl':
					if (!$this->txtBeer) return $this->txtBeer_Create();
					return $this->txtBeer;
				case 'BeerLabel':
					if (!$this->lblBeer) return $this->lblBeer_Create();
					return $this->lblBeer;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					case 'Parent':
						$this->objParentObject = $mixValue;
						break;

					// Controls that point to Review fields
					case 'IdLabel':
						return ($this->lblId = QType::Cast($mixValue, 'QLabel'));
					case 'BeerControl':
						return ($this->txtBeer = QType::Cast($mixValue, 'QIntegerTextBox'));
					case 'BeerLabel':
						return ($this->lblBeer = QType::Cast($mixValue, 'QLabel'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}