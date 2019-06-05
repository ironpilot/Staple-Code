<?php
/**
 * Email Adapter Interface
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


interface IEmailAdapter
{
	/**
	 * @return bool
	 */
    public function send(): bool;

	/**
	 * Add email destination address
	 * @param string $to
	 * @param string $name
	 * @return static
	 */
    public function addTo($to, $name = null);

	/**
	 * Set the array of destination emails as an array.
	 * @param string[] $to
	 * @return static
	 */
    public function setTo(array $to);

	/**
	 * Returns array of Email addresses
	 * @return array
	 */
    public function getTo();

	/**
	 * Add CC email.
	 * @param string $cc
	 * @param string $name
	 * @return static
	 */
    public function addCc($cc, $name = null);

	/**
	 * Set the list of carbon copy emails as an array.
	 * @param string[] $cc
	 * @return static
	 */
    public function setCc(array $cc);

	/**
	 * Return the CC array
	 * @return array
	 */
    public function getCc();

	/**
	 * Add a BCC email.
	 * @param string $bcc
	 * @param string $name
	 * @return static
	 */
    public function addBcc($bcc, $name = null);

	/**
	 * Set the list of blind carbon copy emails as an array
	 * @param array $bcc
	 * @return static
	 */
    public function setBcc(array $bcc);

	/**
	 * Return the BCC email array
	 * @return array
	 */
    public function getBcc();

	/**
	 * Set the From email address
	 * @param string $from
	 * @param string $name
	 * @return static
	 */
    //public function setFrom($from, $name = null);

	/**
	 * @return string
	 */
    public function getFrom();

	/**
	 * Set the email subject
	 * @param string$subject
	 * @return static
	 */
    public function setSubject($subject);

	/**
	 * Get the subject
	 * @return string
	 */
    public function getSubject();

	/**
	 * Set the email message body
	 * @param string $body
	 * @return static
	 */
    public function setBody($body);

	/**
	 * Get the email message body
	 * @return string
	 */
    public function getBody();

	/**
	 * Add an attachment to the email.
	 * @param mixed $attachment
	 * @param string|null $filename
	 * @return static
	 */
    //public function addAttachment($attachment, $filename = null);

	/**
	 * Set attachments as an array
	 * @param array $attachments
	 * @return static
	 */
    public function setAttachments(array $attachments);

	/**
	 * Return array of attachments
	 * @return array
	 */
    public function getAttachments();
}