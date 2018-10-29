<?php

	class QCheckBoxListBase_CodeGenerator extends QListControl_CodeGenerator {
		public function __construct($strControlClassName = 'QCheckBoxList') {
			parent::__construct($strControlClassName);
		}

		/**
		 * Reads the options from the special data file, and possibly the column
		 * @param QCodeGenBase $objCodeGen
		 * @param QSqlTable $objTable
		 * @param QSqlColumn|QReverseReference|QManyToManyReference $objColumn
		 * @param string $strControlVarName
		 * @return string
		 */
		public function ConnectorCreateOptions(QCodeGenBase $objCodeGen, QSqlTable $objTable, $objColumn, $strControlVarName) {
			$strRet = parent::ConnectorCreateOptions($objCodeGen, $objTable, $objColumn, $strControlVarName);

			if (!$objColumn instanceof QManyToManyReference) {
				$objCodeGen->ReportError($objTable->Name . ':' . $objColumn->Name . ' is not compatible with a QCheckBoxList.');
			}

			return $strRet;
		}

		/**
		 * @param QCodeGenBase $objCodeGen
		 * @param QSqlTable $objTable
		 * @param QSqlColumn|QReverseReference $objColumn
		 * @return string
		 */
		public function ConnectorUpdate(QCodeGenBase $objCodeGen, QSqlTable $objTable, $objColumn) {
			$strObjectName = $objCodeGen->ModelVariableName($objTable->Name);
			$strPropName = $objColumn->ObjectDescription;
			$strPropNames = $objColumn->ObjectDescriptionPlural;
			$strControlVarName = $objCodeGen->ModelConnectorVariableName($objColumn);

			$strRet = <<<TMPL
		protected function {$strControlVarName}_Update() {
			if (\$this->{$strControlVarName}) {
				\$this->{$strObjectName}->UnassociateAll{$strPropNames}();
				\$this->{$strObjectName}->Associate{$strPropName}(\$this->{$strControlVarName}->SelectedValues);
			}
		}


TMPL;
			return $strRet;
		}
	}