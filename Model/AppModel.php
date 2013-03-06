<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');
App::uses('CaptchaComponent', 'Controller/Component');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model
{
        
    public function beforeSave($options = array())
    {
        if(isset($this->data[$this->name]['password'])){
            $this->data[$this->name]['password'] = Security::hash($this->data[$this->name]['password'], 'sha1', true);
        }
        return true;
    }
    
    public function beforeValidate($options = array())
    {
        $this->validator()->add('captcha', array(
                'rule1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Enter the color of the box.'
                ),
                'rule2' => array(
                    'rule' => array('validCaptcha'),
                    'message' => 'Captcha does not match'
                )
            )
        );
    }
    
    public function validCaptcha($check)
    {
        $Captcha = new CaptchaComponent(new ComponentCollection());
        return $Captcha->checkCaptcha($check['captcha']);
    }
}
