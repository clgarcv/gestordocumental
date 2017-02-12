<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * SendEmail mailer.
 */
class SendEmailMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'SendEmail';

    public function sendEmail(array $data)
	{
	     $this->from('soporte.practicas@unirioja.es','Users')
	                ->to('cuenta soporte.practicas@unirioja.es')
	                ->subject(sprintf('Welcome %s', $data->name))
	                ->template('default','default')
	                ->set(['data'=>$data->first_name]);
	}
}
