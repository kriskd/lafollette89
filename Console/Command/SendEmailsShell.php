<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('PhpReader', 'Configure');

class SendEmailsShell extends AppShell
{
    public $uses = array('SendEmail');
    
    public function __construct()
    {
        parent::__construct();
        Configure::config('default', new PhpReader());
        Configure::load('my_configs', 'default');
    }
    
    /**
     * Pull emails from database to send via cronjob
     */
    public function main()
    {
        $from_email = Configure::read('email'); 
        $email = new CakeEmail(); 
        $email->config('smtp');
        $email->from(array($from_email => 'La Follette 89'));
        
        $sendemails = $this->SendEmail->find('all', array('limit' => 2));
        foreach($sendemails as $sendmail){
            $id = $sendmail['SendEmail']['id'];
            $from_email = $sendmail['SendEmail']['from_email'];
            $to_email = $sendmail['SendEmail']['to_email'];
            $subject = $sendmail['SendEmail']['subject'];
            $body = $sendmail['SendEmail']['body'];
            $email->replyTo($from_email);
            $email->returnPath($from_email);

            $email->to($to_email)
                    ->subject($subject)
                    ->send($body);
                    
            $this->SendEmail->delete($id);
        }
        
    }
}