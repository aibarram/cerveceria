<?php
	/**
	 * This is a ModelConnector class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Scale class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Scale object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ScaleConnector
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 *
	 * @package My QCubed Application
	 * @subpackage ModelConnector
	 * @property-read Scale $Scale the actual Scale data class being edited
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

	class ScaleConnectorGen extends QBaseClass {
		// General Variables
		/**
		 * @var Scale objScale
		 * @access protected
		 */
		protected $objScale;
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

		// Controls that correspond to Scale's individual data fields
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
		 * ScaleConnector to edit a single Scale object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Scale object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScaleConnector
		 * @param Scale $objScale new or existing Scale object
		 */
		 public function __construct($objParentObject, Scale $objScale) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ScaleConnector)
			$this->objParentObject = $objParentObject;

			// Setup linked Scale object
			$this->objScale = $objScale;

			// Figure out if we're Editing or Creating New
			if ($this->objScale->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScaleConnector
		 * @param null|integer $intId primary key value
		 * @param integer $intCreateType rules governing Scale object creation - defaults to CreateOrEdit
 		 * @return ScaleConnector
		 * @throws QCallerException
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objScale = Scale::Load($intId);

				// Scale was found -- return it!
				if ($objScale)
					return new ScaleConnector($objParentObject, $objScale);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QModelConnectorCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Scale object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QModelConnectorCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ScaleConnector($objParentObject, new Scale());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScaleConnector
		 * @param integer $intCreateType rules governing Scale object creation - defaults to CreateOrEdit
		 * @return ScaleConnector
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ScaleConnector::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScaleConnector
		 * @param integer $intCreateType rules governing Scale object creation - defaults to CreateOrEdit
		 * @return ScaleConnector
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QModelConnectorCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ScaleConnector::Create($objParentObject, $intId, $intCreateType);
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
			$this->lblId->LinkedNode = QQN::Scale()->Id;
			$this->lblId->Text =  $this->blnEditMode ? $this->objScale->Id : QApplication::Translate('N\A');
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
			$this->txtName->MaxLength = Scale::NameMaxLength;
			$this->txtName->PreferredRenderMethod = 'RenderWithName';
			$this->txtName->LinkedNode = QQN::Scale()->Name;
			$this->txtName->Text = $this->objScale->Name;
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
			$this->lblName->LinkedNode = QQN::Scale()->Name;
			$this->lblName->Text = $this->objScale->Name;
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
			$this->txtDescription->MaxLength = Scale::DescriptionMaxLength;
			$this->txtDescription->PreferredRenderMethod = 'RenderWithName';
			$this->txtDescription->LinkedNode = QQN::Scale()->Description;
			$this->txtDescription->Text = $this->objScale->Description;
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
			$this->lblDescription->LinkedNode = QQN::Scale()->Description;
			$this->lblDescription->Text = $this->objScale->Description;
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
			$this->chkActive->Checked = $this->objScale->Active;
			$this->chkActive->PreferredRenderMethod = 'RenderWithName';
			$this->chkActive->LinkedNode = QQN::Scale()->Active;
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
			$this->lblActive->LinkedNode = QQN::Scale()->Active;
			$this->lblActive->Text = $this->objScale->Active ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActive;
		}





		/**
		 * Refresh this ModelConnector with Data from the local Scale object.
		 * @param boolean $blnReload reload Scale from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			assert($this->objScale); // Notify in development version
			if (!($this->objScale)) return; // Quietly fail in production

			if ($blnReload) {
				$this->objScale->Reload();
			}
			if ($this->lblId) $this->lblId->Text =  $this->blnEditMode ? $this->objScale->Id : QApplication::Translate('N\A');


			if ($this->txtName) $this->txtName->Text = $this->objScale->Name;
			if ($this->lblName) $this->lblName->Text = $this->objScale->Name;


			if ($this->txtDescription) $this->txtDescription->Text = $this->objScale->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objScale->Description;


			if ($this->chkActive) $this->chkActive->Checked = $this->objScale->Active;
			if ($this->lblActive) $this->lblActive->Text = $this->objScale->Active ? QApplication::Translate('Yes') : QApplication::Translate('No');


		}

		/**
		 * Load this ModelConnector with a Scale object. Returns the object found, or null if not
		 * successful. The primary reason for failure would be that the key given does not exist in the database. This
		 * might happen due to a programming error, or in a multi-user environment, if the record was recently deleted.
		 * @param null|integer $intId
		 * @param $objClauses
		 * @return null|Scale
		 */
		 public function Load($intId = null, $objClauses = null) {
			if (!is_null($intId)) {
				$this->objScale = Scale::Load($intId, $objClauses);
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			}
			else {
				$this->objScale = new Scale();
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
			if ($this->objScale) {
				$this->Refresh ();
			}
			return $this->objScale;
		}
		 



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SCALE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		* This will update this object's Scale instance,
		* updating only the fields which have had a control created for it.
		*/
		public function UpdateScale() {
			try {
				// Update any fields for controls that have been created

				if ($this->txtName) $this->objScale->Name = $this->txtName->Text;

				if ($this->txtDescription) $this->objScale->Description = $this->txtDescription->Text;

				if ($this->chkActive) $this->objScale->Active = $this->chkActive->Checked;


				// Update any UniqueReverseReferences for controls that have been created for it

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}


		/**
		 * This will save this object's Scale instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveScale($blnForceUpdate = false) {
			try {
				$this->UpdateScale();
                $id = $this->objScale->Save(false, $blnForceUpdate);

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			return $id;
		}

		/**
		 * This will DELETE this object's Scale instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteScale() {
			$this->objScale->Delete();
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
				case 'Scale': return $this->objScale;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Scale fields -- will be created dynamically if not yet created
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

					// Controls that point to Scale fields
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