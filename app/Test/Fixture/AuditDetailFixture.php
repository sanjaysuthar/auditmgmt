<?php
/**
 * AuditDetailFixture
 *
 */
class AuditDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'auditid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'Audit Id'),
		'accessid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'Access Id FK Ref to Access_Details Table'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'comment' => 'Audit Status', 'charset' => 'latin1'),
		'month' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'latin1_swedish_ci', 'comment' => 'Audit Month', 'charset' => 'latin1'),
		'year' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'Audit Year'),
		'auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'comment' => 'Auditor', 'charset' => 'latin1'),
		'comments' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => 'Comments', 'charset' => 'latin1'),
		'evidence1' => array('type' => 'binary', 'null' => true, 'default' => null, 'comment' => 'Screenshot'),
		'evidence2' => array('type' => 'binary', 'null' => true, 'default' => null, 'comment' => 'Screenshot'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'auditid', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'auditid' => 1,
			'accessid' => 1,
			'status' => 'Lorem ip',
			'month' => 'Lor',
			'year' => 1,
			'auditor' => 'Lorem ipsum dolor sit amet',
			'comments' => 'Lorem ipsum dolor sit amet',
			'evidence1' => 'Lorem ipsum dolor sit amet',
			'evidence2' => 'Lorem ipsum dolor sit amet'
		),
	);

}
