<?php
/**
 * AccessDetailFixture
 *
 */
class AccessDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'accessid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'Primary Key'),
		'uniqueid' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'comment' => 'Unique Id/User Id', 'charset' => 'latin1'),
		'fname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'comment' => 'First Name', 'charset' => 'latin1'),
		'lname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'comment' => 'Last Name', 'charset' => 'latin1'),
		'systype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'comment' => 'System Type', 'charset' => 'latin1'),
		'sysname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'comment' => 'System Name/IP', 'charset' => 'latin1'),
		'env' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'comment' => 'Enviornment', 'charset' => 'latin1'),
		'accresp' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'comment' => 'Access Responsible', 'charset' => 'latin1'),
		'acctype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'comment' => 'Access Type', 'charset' => 'latin1'),
		'accprivilege' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'comment' => 'Access Privilege', 'charset' => 'latin1'),
		'accidassigned' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'comment' => 'Access Id Assigned', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'accessid', 'unique' => 1)
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
			'accessid' => 1,
			'uniqueid' => 'Lorem ipsum dolor sit amet',
			'fname' => 'Lorem ipsum dolor sit amet',
			'lname' => 'Lorem ipsum dolor sit amet',
			'systype' => 'Lorem ipsum dolor sit amet',
			'sysname' => 'Lorem ipsum dolor sit amet',
			'env' => 'Lorem ipsum dolor ',
			'accresp' => 'Lorem ip',
			'acctype' => 'Lorem ipsum dolor ',
			'accprivilege' => 'Lorem ip',
			'accidassigned' => 'Lorem ipsum dolor sit amet'
		),
	);

}
