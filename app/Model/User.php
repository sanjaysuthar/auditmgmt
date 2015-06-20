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
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $actsAs = array('Containable');
    public $belongsTo = array('Teams');

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
        'userid' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Letters and numbers only'
            ),
            'between' => array(
                'rule' => array('lengthBetween', 5, 10),
                'message' => 'Length should be between 5 to 10 characters'
            ),
            'isunique' => array(
                'rule' => 'isUnique',
                'message' => 'User already exists, try a different User ID.'
            ),
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'secret' => array(
            'length' => array(
                'rule'      => array('between', 5, 30),
                'message'   => 'Your password must be between 5 and 30 characters.',
            ),
        ),
        'secretrep' => array(
            'compare'    => array(
                'rule'      => array('validate_passwords'),
                'message' => 'The passwords you entered do not match.',
            )
        ),
        'secretcurrent' => array(
            'compare'    => array(
                'rule'      => array('validate_current_password'),
                'message' => 'Current password is wrong!.',
            )
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'contact' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
            'between' => array(
                'rule' => array('lengthBetween', 10, 10),
                'message' => 'Exactly 10 digits please...'
            )
        ),
        'teams_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        )
    );

    /**
     * Validate NewPassword and ConfirmPassword fields
     * @return bool
     */
    public function validate_passwords() {
        return $this->data[$this->alias]['secret'] === $this->data[$this->alias]['secretrep'];
    }

    /**
     * Validate Old Password from Database
     * @return bool
     */
    public function validate_current_password() {
        $user = $this->find('first', array(
            'conditions' => array(
                'User.id' => AuthComponent::user('id')
            ),
            'fields' => array('secret')
        ));
        $storedHash = $user['User']['secret'];
        $newHash = Security::hash($this->data[$this->alias]['secretcurrent'], 'blowfish', $storedHash);
        return $storedHash == $newHash;
    }

    /**
     * Hashing password before save
     * @param array $options
     * @return bool
     */
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['secret'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['secret'] = $passwordHasher->hash(
                $this->data[$this->alias]['secret']
            );
        }
        return true;
    }
}