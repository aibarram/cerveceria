<?php
/**
 * Code generator for the DataGrid2 object.
 */

class QDataGridBase_CodeGenerator extends QHtmlTable_CodeGenerator {
	/** @var  string */
	protected $strControlClassName;

	public function __construct($strControlClassName = 'QDataGrid') {
		$this->strControlClassName = $strControlClassName;
	}
	
}