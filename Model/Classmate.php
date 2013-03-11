<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Classmate Model
 *
 */
class Classmate extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
            'id' => array(
                    'numeric' => array(
                            'rule' => array('numeric'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'firstName' => array(
                    'alphaDash' => array(
                            'rule' => array('custom', '/^[a-zA-Z-]*$/'),
                            'message' => 'Enter a valid first name.',
                            //'allowEmpty' => false,
                            //'required' => true,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            'message' => 'Please enter your first name.',
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'currentLastName' => array(
                    'alphaDash' => array(
                            'rule' => array('custom', '/^[a-zA-Z-]*$/'),
                            'message' => 'Enter a valid last name.',
                            'allowEmpty' => false,
                            //'required' => true,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            'message' => 'Please enter your current last name.',
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'formerLastName' => array(
                    'alphaDash' => array(
                            'rule' => array('custom', '/^[a-zA-Z-]*$/'),
                            'message' => 'Enter a valid last name.',
                            'allowEmpty' => true,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'email' => array(
                    'email' => array(
                            'rule' => array('email'),
                            'message' => 'This must be a valid email.',
                            'allowEmpty' => false,
                            //'required' => true,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            'message' => 'Email is required.',
                            //'allowEmpty' => false,
                            //'required' => true,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'unique' => array(
                            'rule' => 'isUnique',
                            'message' => 'This email is already registered.'
                    ),
            ),
            'legitComments' => array(
                    'minlength' => array(
                            'rule' => array('minlength', 10),
                            'message' => 'I think you should tell me a little more.',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            'message' => 'Please complete this field.',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'display' => array(
                    'boolean' => array(
                            'rule' => array('boolean'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'displaybio' => array(
                    'boolean' => array(
                            'rule' => array('boolean'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'emailClassmateAdd' => array(
                    'numeric' => array(
                            'rule' => array('numeric'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
            'login' => array(
                    'alphanumeric' => array(
                            'rule' => array('alphanumeric'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            'message' => 'Login is required.',
                            //'allowEmpty' => false,
                            //'required' => true,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'unique' => array(
                            'rule' => 'isUnique',
                            'message' => 'This login is not available.'
                    ),
            ),
            'password' => array(
                    'notempty' => array(
                            'rule' => array('notEmpty'),
                    ),
            ),
            'role' => array(
                    'numeric' => array(
                            'rule' => array('numeric'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                    'notempty' => array(
                            'rule' => array('notempty'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
    );
    
    public function addPwValidator()
    {
        $this->validator()
            ->add('password', array(
                    'match' => array(
                        'rule' => array('pwMatch'),
                        'message' => 'Passwords do not match.'
                    ),  
                )
            )
            ->add('password2', array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please confirm your password.'
                ),
            )
        );
    }
    
    public function addPasswordChange()
    {
        $this->validator()
            ->add('passwordNew', array(
                'match' => array(
                    'rule' => array('passwordMatch'),
                    'message' => 'Passwords do not match.',
                    'allowEmpty' => true,
                ),
            )
        );
    }
    
    public function passwordMatch($check)
    {   
        $password2 = $this->data['Classmate']['password2']; 
        return $password2 == current($check) ? true : false;
    }
    
    public function addVerifyPassword()
    {
        $this->validator()
            ->add('password', array(
                    'verify' => array(
                        'rule' => array('pwVerify'),
                        'message' => 'Password mismatch, try again.'
                    ),  
                )
            );
            
    }
    
    public function pwVerify($check)
    {   
        $password = $check['password']; 
        $hash = AuthComponent::password($password); 
        $id = AuthComponent::user('id');
        $user_pw_hash = Classmate::find('list', array('conditions' => compact('id'),
                                                        'fields' => array('password')
                                                        )
                                        );
        $user_pw_hash = array_shift($user_pw_hash);
        
        return strcasecmp($hash, $user_pw_hash)==0 ? true : false;
    }
    
    public function addUniqueEmail()
    {
        $this->validator()->remove('email', 'unique');
        $this->validator()
            ->add('email', array(
                    'uniqueEmail' => array(
                        'rule' => array('uniqueEmail'),
                        'message' => 'This email is taken, choose another.'
                    )
                )
            );
    }
    
    public function uniqueEmail($check)
    {
        $user_id = $this->find('first', array('conditions' => array('email' => $check['email']),
                                                                'fields' => array('id')));
        $user_id = $user_id['Classmate']['id'];
        
        if(empty($user_id)) return true;
        
        if(AuthComponent::user('id') == $user_id) return true;
        
        return false;
    }
}
