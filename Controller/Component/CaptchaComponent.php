<?php
App::uses('Component', 'Controller');

class CaptchaComponent extends Component
{
    public $components = array('Session');
    
    public function makeCaptcha()
    {
        $rand = rand(1,4);
        $this->Session->write(compact('rand'));
        return 'box' . $rand . '.gif';
    }
    
    public function checkCaptcha($captcha)
    {
        $session = $this->Session->read('rand'); 
        switch($session){
            case 1:
                $color = 'red';
                break;
            case 2:
                $color = 'blue';
                break;
            case 3:
                $color = 'yellow';
                break;
            case 4:
                $color = 'green';
                break;
            default:
                return false;
        } 
        if(strcasecmp($captcha, $color)==0){
            return true;
        }
        return false;
    }
}