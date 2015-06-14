<?php
/**
 * Thrust: The Audit Management Tool
 *
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v2.0
 * Date: 6/11/15
 * Time: 8:23 PM
 */
class Team extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = array('User');

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        )
    );
}