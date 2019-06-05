<?php
/**
 * SendGrid Email Adapter for sending emails through SendGrid.
 *
 * Template File:
 * In the template file a custom comment <!--STAPLE-EMAIL-BODY--> this is where the body of
 * the email is replaced.
 *
 *
 * @author Ironpilot
 * @copyright Copyright (c) 2011, STAPLE CODE
 *
 * This file is part of the STAPLE Framework.
 *
 * The STAPLE Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your option)
 * any later version.
 *
 * The STAPLE Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for
 * more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with the STAPLE Framework.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Staple\Email;

use SendGrid;
use Staple\Config;
use Exception, stdClass;

class SendGridEmailAdapter implements IEmailAdapter
{
	/**
	 * SendGrid Mail object
	 * @var SendGrid\Mail\Mail
	 */
	private $mail;

    /**
     * The main SendGrid Object
     * @var SendGrid
     */
    private $sendGrid;

    /**
     * Holds the SendGrid response Object
     * @var stdClass;
     */
    private $response;

    /**
     * The last exception that occurred during execution.
     * @var Exception;
     */
    private $exception;

	/**
	 * SendGridEmailAdapter constructor.
	 * @throws \Staple\Exception\ConfigurationException
	 */
    public function __construct()
    {
		$this->createMailObject();
        $this->createSendGridObject();
    }

    /**
     * Create the SendGrid object to facilitate sending email.
     * @throws \Staple\Exception\ConfigurationException
     */
    private function createSendGridObject()
    {
        $this->sendGrid = new SendGrid(Config::getValue('email','sendgrid_api'));
    }

    private function createMailObject()
	{
		$this->mail = new SendGrid\Mail\Mail();
	}

	/**
	 * Set the email body.
	 * @param string $body
	 * @return static
	 */
    public function setBody($body)
    {
		$this->mail->addContent("text/html", $body);
		return $this;
    }

    /**
     * Try to send the email and catch any exceptions that occur.
	 * @return bool
     * @throws SendGrid\Exception
     */
    public function send(): bool
    {
        try {
            $this->sendGrid->send($this->mail);
            return true;
        } catch (\Exception $e) {
            $this->exception = $e;
            return false;
        }
    }

    /**
     * @return stdClass
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param stdClass $response
     * @return $this
     */
    public function setResponse(stdClass $response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return array
     */
    public function getTo()
    {
        //@todo finish method
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->mail->getContents();
    }

    /**
     * @return array
     */
    public function getCc()
    {
        //@todo finish method.
    }

    /**
     * @return array
     */
    public function getBcc()
    {
        //@todo finish this method
    }

    /**
	 * Set the from email.
	 *
     * @param string $email
     * @param string $name
     * @return $this
     */
    public function setFrom($email, $name=NULL)
    {
		$this->mail->setFrom("test@example.com", "Example User");
        return $this;
    }

	/**
	 * @param string $to
	 * @param string $name
	 * @return static
	 */
	public function addTo($to, $name = null)
	{
		$this->mail->addTo("test@example.com", "Example User");
		return $this;
	}

	public function setTo(array $to)
	{
		// TODO: Implement setTo() method.
	}

	public function addCc($cc, $name = null)
	{
		// TODO: Implement addCc() method.
	}

	public function setCc(array $cc)
	{
		// TODO: Implement setCc() method.
	}

	public function addBcc($bcc, $name = null)
	{
		// TODO: Implement addBcc() method.
	}

	public function setBcc(array $bcc)
	{
		// TODO: Implement setBcc() method.
	}

	public function getFrom()
	{
		return $this->mail->getFrom();
	}

	/**
	 * Set the email subject.
	 * @param string $subject
	 * @return static
	 */
	public function setSubject($subject)
	{
		$this->mail->setSubject($subject);
		return $this;
	}

	/**
	 * Return the subject string.
	 * @return string
	 */
	public function getSubject()
	{
		return $this->mail->getSubject();
	}

	public function addAttachment($attachment, $filename = null)
	{
		// TODO: Implement addAttachment() method.
	}

	public function setAttachments(array $attachments)
	{
		// TODO: Implement setAttachments() method.
	}

	public function getAttachments()
	{
		// TODO: Implement getAttachments() method.
	}
}