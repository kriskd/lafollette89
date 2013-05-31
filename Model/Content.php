<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 */
class Content extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
    public $useDbConfig = 'development';

/**
 * Validation rules
 *
 * @var array
 */
    /*public $validate = array(
            'id' => array(
                    'notempty' => array(
                            'rule' => array('notempty'),
                            //'message' => 'Your custom message here',
                            //'allowEmpty' => false,
                            //'required' => false,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
            ),
    );*/
        
    /**
     * Add the slug to the save for save
     * This processes one record at a time in the saveMany
     * For adding content, the data is formatted like saveMany data before getting here.
     */
    public function beforeSave($options = array())
    {   
        parent::beforeSave($options);
        $request = Router::getRequest(); 
        if($slug = $request->params['pass'][0]){
            $this->data['Content']['slug'] = $slug;
            return true;
        }
        return false;
    }
}
