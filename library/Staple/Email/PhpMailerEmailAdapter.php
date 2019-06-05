<?php


namespace Staple\Email;

use PHPMailer\PHPMailer\PHPMailer;

class PhpMailerEmailAdapter extends PHPMailer implements IEmailAdapter
{
	public function send(): bool
	{
		return parent::send();
	}

	public function addTo($to, $name = null): PhpMailerEmailAdapter
	{
		if(is_string($name))
			$this->to[$name] = $to;
		else
			$this->to[] = $to;
		return $this;
	}

	/**
	 * @param array $to
	 * @return PhpMailerEmailAdapter
	 */
	public function setTo(array $to): PhpMailerEmailAdapter
	{
		$this->to = $to;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getTo(): array
	{
		return $this->to;
	}

	public function addCc($cc, $name = null): PhpMailerEmailAdapter
	{
		if(is_string($name))
			$this->cc[$name] = $cc;
		else
			$this->cc[] = $cc;
		return $this;
	}

	public function setCc(array $cc): PhpMailerEmailAdapter
	{
		$this->cc = $cc;
		return $this;
	}

	public function getCc(): array
	{
		return $this->cc;
	}

	public function addBcc($bcc, $name = null): PhpMailerEmailAdapter
	{
		if(is_string($name))
			$this->bcc[$name] = $bcc;
		else
			$this->bcc[] = $bcc;
		return $this;
	}

	public function setBcc(array $bcc): PhpMailerEmailAdapter
	{
		$this->bcc = $bcc;
		return $this;
	}

	public function getBcc(): array
	{
		return $this->bcc;
	}

	public function setFrom($from, $name = null, $auto = true): PhpMailerEmailAdapter
	{
		$this->From = $from;
		if(is_string($name))
			$this->FromName = $name;
		return $this;
	}

	public function getFrom(): string
	{
		return $this->From;
	}

	public function setSubject($subject): PhpMailerEmailAdapter
	{
		$this->Subject = $subject;
		return $this;
	}

	public function getSubject(): string
	{
		return $this->Subject;
	}

	public function setBody($body): PhpMailerEmailAdapter
	{
		$this->Body = $body;
		return $this;
	}

	public function getBody(): string
	{
		return $this->Body;
	}

	public function addAttachment($path, $filename = null, $encoding = 'base64', $type = '', $disposition = 'attachment')
	{
		return parent::addAttachment($path, $filename, $encoding, $type, $disposition); // TODO: Change the autogenerated stub
	}


	public function setAttachments(array $attachments): PhpMailerEmailAdapter
	{
		// TODO: Implement setAttachments() method.
	}

	public function getAttachments(): array
	{
		return parent::getAttachments();
	}

}