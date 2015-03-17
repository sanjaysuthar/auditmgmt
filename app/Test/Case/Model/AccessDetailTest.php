<?php
App::uses('AccessDetail', 'Model');

/**
 * AccessDetail Test Case
 *
 */
class AccessDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.access_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AccessDetail = ClassRegistry::init('AccessDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AccessDetail);

		parent::tearDown();
	}

}
