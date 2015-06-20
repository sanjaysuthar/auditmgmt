<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	1.0
 * @since:	v1.0
 */
App::uses('AppModel', 'Model');
/**
 * AccessDetail Model
 *
 */
class AccessDetail extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = array('AuditDetail');

    /**
     * Primary key field
     *
     * @var string
     */
	public $primaryKey = 'accessid';

    /**
     * Validation rules
     *
     * @var array
     */
	public $validate = array(
		'uniqueid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'systype' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'sysname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'env' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'accresp' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'acctype' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'accprivilege' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'accidassigned' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
	);
}