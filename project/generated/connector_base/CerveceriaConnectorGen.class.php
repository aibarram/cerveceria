<?php
	/**
	 * This is a ModelConnector class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Cerveceria class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Cerveceria object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CerveceriaConnector
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage ModelConnector
	 * @property-read Cerveceria $Cerveceria the actual Cerveceria data class being edited
	 * @property QIntegerTextBox $IdControl
	 * @property-read QLabel $IdLabel
	 * @property QTextBox $NameControl
	 * @property-read QLabel $NameLabel
	 * @property QTextBox $DescriptionControl
	 * @property-read QLabel $DescriptionLabel
	 * @property QCheckBox $ActiveControl
	 * @property-read QLabel $ActiveLabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CerveceriaConnectorGen extends QBaseClass {
		// General Variables
		/**
		 * @var Cerveceria objCerveceria
		 * @access protected
		 */
		protected $objCerveceria;
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

		// Controls that correspond to Cerveceria's individual data fields
		/**
		 * @var QIntegerTextBox txtId

		 * @access protected
		 */
		protected $txtId;

		/**
		 * @var QLabel lblId
		 * @access protected
		 */
		protected $lblId;

		/**
		 * @var QTextBox txtName

		 * @access protected
		 */
		protected $txtName;

		/**
		 * @var QLabel lblName
		 * @access protected
		 */
		protected $lblName;

		/**
		 * @var QTextBox txtDescription

		 * @access protected
		 */
		protected $txtDescription;

		/**
		 * @var QLabel lblDescription
		 * @access protected
		 */
		protected $lblDescription;

		/**
		 * @var QCheckBox chkActive

		 * @access protected
		 */
		protected $chkActive;

		/**
		 * @var QLabel lblActive
		 * @access protected
		 */
		protected $lblActive;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CerveceriaConnector to edit a single Cerveceria object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Cerveceria object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CerveceriaConnector
		 * @param Cerveceria $objCerveceria new or existing Cerveceria object
		 */
		 public function __construct($objParentObject, Cerveceria $objCerveceria) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CerveceriaConnector)
			$this->objParentObject = $objParentObject;

			// Setup linked Cerveceria object
			$this->objCerveceria = $objCerveceria;

			// Figure out if we're Editing or Creating New
			if ($this->objCerveceria->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CerveceriaConnector
		 * @param null|integer $intId primary key value
		 * @param integer $intCreateType rules governing Cerveceria object creation - defaults to CreateOrEdit
 		 * @return CerveceriaConnector
		 * @throws QCallerException
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCerveceria = Cerveceria::Load($intId);

				// Cerveceria was found -- return it!
				if ($objCerveceria)
					return new CerveceriaConnector($objParentObject, $objCerveceria);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QModelConnectorCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Cerveceria object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QModelConnectorCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CerveceriaConnector($objParentObject, new Cerveceria());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CerveceriaConnector
		 * @param integer $intCreateType rules governing Cerveceria object creation - defaults to CreateOrEdit
		 * @return CerveceriaConnector
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CerveceriaConnector::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CerveceriaConnector
		 * @param integer $intCreateType rules governing Cerveceria object creation - defaults to CreateOrEdit
		 * @return CerveceriaConnector
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CerveceriaConnector::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup a QIntegerTextBox txtId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtId_Create($strControlId = null) {
			$this->txtId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtId->Name = QApplication::Translate('Id');
			$this->txtId->Required = true;
			$this->txtId->PreferredRenderMethod = 'RenderWithName';
			$this->txtId->LinkedNode = QQN::Cerveceria()->Id;
			$this->txtId->Text = $this->objCerveceria->Id;
			return $this->txtId;
		}

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
			$this->lblId->LinkedNode = QQN::Cerveceria()->Id;
			$this->lblId->Text = $this->objCerveceria->Id;
			return $this->lblId;
		}



		/**
		 * Create and setup a QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Cerveceria::NameMaxLength;
			$this->txtName->PreferredRenderMethod = 'RenderWithName';
			$this->txtName->LinkedNode = QQN::Cerveceria()->Name;
			$this->txtName->Text = $this->objCerveceria->Name;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 *
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->PreferredRenderMethod = 'RenderWithName';
			$this->lblName->LinkedNode = QQN::Cerveceria()->Name;
			$this->lblName->Text = $this->objCerveceria->Name;
			return $this->lblName;
		}



		/**
		 * Create and setup a QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Required = true;
			$this->txtDescription->MaxLength = Cerveceria::DescriptionMaxLength;
			$this->txtDescription->PreferredRenderMethod = 'RenderWithName';
			$this->txtDescription->LinkedNode = QQN::Cerveceria()->Description;
			$this->txtDescription->Text = $this->objCerveceria->Description;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 *
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->PreferredRenderMethod = 'RenderWithName';
			$this->lblDescription->LinkedNode = QQN::Cerveceria()->Description;
			$this->lblDescription->Text = $this->objCerveceria->Description;
			return $this->lblDescription;
		}



		/**
		 * Create and setup a QCheckBox chkActive
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActive_Create($strControlId = null) {
			$this->chkActive = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActive->Name = QApplication::Translate('Active');
			$this->chkActive->Checked = $this->objCerveceria->Active;
			$this->chkActive->PreferredRenderMethod = 'RenderWithName';
			$this->chkActive->LinkedNode = QQN::Cerveceria()->Active;
			return $this->chkActive;
		}

		/**
		 * Create and setup QLabel lblActive
		 *
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActive_Create($strControlId = null) {
			$this->lblActive = new QLabel($this->objParentObject, $strControlId);
			$this->lblActive->Name = QApplication::Translate('Active');
			$this->lblActive->PreferredRenderMethod = 'RenderWithName';
			$this->lblActive->LinkedNode = QQN::Cerveceria()->Active;
			$this->lblActive->Text = $this->objCerveceria->Active ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActive;
		}





		/**
		 * Refresh this ModelConnector with Data from the local Cerveceria object.
		 * @param boolean $blnReload reload Cerveceria from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			assert($this->objCerveceria); // Notify in development version
			if (!($this->objCerveceria)) return; // Quietly fail in production

			if ($blnReload) {
				$this->objCerveceria->Reload();
			}
			if ($this->txtId) $this->txtId->Text = $this->objCerveceria->Id;
			if ($this->lblId) $this->lblId->Text = $this->objCerveceria->Id;


			if ($this->txtName) $this->txtName->Text = $this->objCerveceria->Name;
			if ($this->lblName) $this->lblName->Text = $this->objCerveceria->Name;


			if ($this->txtDescription) $this->txtDescription->Text = $this->objCerveceria->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objCerveceria->Description;


			if ($this->chkActive) $this->chkActive->Checked = $this->objCerveceria->Active;
			if ($this->lblActive) $this->lblActive->Text = $this->objCerveceria->Active ? QApplication::Translate('Yes') : QApplication::Translate('No');


		}

		/**
		 * Load this ModelConnector with a Cerveceria object. Returns the object found, or null if not
		 * successful. The primary reason for failure would be that the key given does not exist in the database. This
		 * might happen due to a programming error, or in a multi-user environment, if the record was recently deleted.
		 * @param null|integer $intId
		 * @param $objClauses
		 * @return null|Cerveceria
		 */
		 public function Load($intId = null, $objClauses = null) {
			if (!is_null($intId)) {
				$this->objCerveceria = Cerveceria::Load($intId, $objClauses);
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			}
			else {
				$this->objCerveceria = new Cerveceria();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
			if ($this->objCerveceria) {
				$this->Refresh ();
			}
			return $this->objCerveceria;
		}
		 



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CERVECERIA OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		* This will update this object's Cerveceria instance,
		* updating only the fields which have had a control created for it.
		*/
		public function UpdateCerveceria() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objCerveceria->Id = $this->txtId->Text;

				if ($this->txtName) $this->objCerveceria->Name = $this->txtName->Text;

				if ($this->txtDescription) $this->objCerveceria->Description = $this->txtDescription->Text;

				if ($this->chkActive) $this->objCerveceria->Active = $this->chkActive->Checked;


				// Update any UniqueReverseReferences for controls that have been created for it

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}


		/**
		 * This will save this object's Cerveceria instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCerveceria($blnForceUpdate = false) {
			try {
				$this->UpdateCerveceria();
                $id = $this->objCerveceria->Save(false, $blnForceUpdate);

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			return $id;
		}

		/**
		 * This will DELETE this object's Cerveceria instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCerveceria() {
			$this->objCerveceria->Delete();
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
				case 'Cerveceria': return $this->objCerveceria;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Cerveceria fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'ActiveControl':
					if (!$this->chkActive) return $this->chkActive_Create();
					return $this->chkActive;
				case 'ActiveLabel':
					if (!$this->lblActive) return $this->lblActive_Create();
					return $this->lblActive;
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

					// Controls that point to Cerveceria fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QIntegerTextBox'));
					case 'IdLabel':
						return ($this->lblId = QType::Cast($mixValue, 'QLabel'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QTextBox'));
					case 'NameLabel':
						return ($this->lblName = QType::Cast($mixValue, 'QLabel'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QTextBox'));
					case 'DescriptionLabel':
						return ($this->lblDescription = QType::Cast($mixValue, 'QLabel'));
					case 'ActiveControl':
						return ($this->chkActive = QType::Cast($mixValue, 'QCheckBox'));
					case 'ActiveLabel':
						return ($this->lblActive = QType::Cast($mixValue, 'QLabel'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}