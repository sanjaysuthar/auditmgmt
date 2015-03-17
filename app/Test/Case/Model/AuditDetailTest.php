<?php
App::uses('AuditDetail', 'Model');

/**
 * AuditDetail Test Case
 *
 */
class AuditDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.audit_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AuditDetail = ClassRegistry::init('AuditDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuditDetail);

		parent::tearDown();
	}

}
