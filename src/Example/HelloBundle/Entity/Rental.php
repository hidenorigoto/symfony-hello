<?php
/**
 * PHP version 5.5
 *
 * Copyright (c) 2014 GOTO Hidenori <hidenorigoto@gmail.com>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    Example_HelloBundle
 * @copyright  2014 GOTO Hidenori <hidenorigoto@gmail.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @since      File available since Release 1.0.0
 */
namespace Example\HelloBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rental
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Example\HelloBundle\Entity\RentalRepository")
 */
class Rental
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rentAt", type="datetime")
     */
    private $rentAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="days", type="integer")
     */
    private $days;

    /**
     * @var integer
     *
     * @ORM\Column(name="fee", type="integer")
     */
    private $fee;

    /**
     * @ORM\ManyToOne(targetEntity="Member", cascade={"all"})
     */
    private $Member;

    /**
     * @ORM\OneToMany(targetEntity="RentalDetail", mappedBy="Rental", cascade={"all"}, orphanRemoval=true)
     */
    private $RentalDetails;

    function __construct()
    {
        $this->RentalDetails = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Rental
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set rentAt
     *
     * @param \DateTime $rentAt
     * @return Rental
     */
    public function setRentAt($rentAt)
    {
        $this->rentAt = $rentAt;

        return $this;
    }

    /**
     * Get rentAt
     *
     * @return \DateTime 
     */
    public function getRentAt()
    {
        return $this->rentAt;
    }

    /**
     * Set days
     *
     * @param integer $days
     * @return Rental
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set fee
     *
     * @param integer $fee
     * @return Rental
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return integer 
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $Member
     */
    public function setMember($Member)
    {
        $this->Member = $Member;
    }

    /**
     * @return mixed
     */
    public function getMember()
    {
        return $this->Member;
    }

    /**
     * @param mixed $RentalDetails
     */
    public function setRentalDetails($RentalDetails)
    {
        $this->RentalDetails = $RentalDetails;
    }

    /**
     * @return mixed
     */
    public function getRentalDetails()
    {
        return $this->RentalDetails;
    }
}
