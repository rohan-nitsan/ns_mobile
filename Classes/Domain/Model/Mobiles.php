<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Domain\Model;


/**
 * This file is part of the "NS Mobile" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Rohan Parmar <rohan.nitsan@gmail.com>, NITSAN Technologies
 */

/**
 * Mobiles
 */
class Mobiles extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * price
     *
     * @var int
     */
    protected $price = 0;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * manufactureDate
     *
     * @var \DateTime
     */
    protected $manufactureDate = null;

    /**
     * warranty
     *
     * @var string
     */
    protected $warranty = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * ram
     *
     * @var string
     */
    protected $ram = '';

    /**
     * model
     *
     * @var \NITSAN\NsMobile\Domain\Model\Model
     */
    protected $model = null;

    /**
     * brand
     *
     * @var \NITSAN\NsMobile\Domain\Model\Brand
     */
    protected $brand = null;

    /**
     * technology
     *
     * @var \NITSAN\NsMobile\Domain\Model\Technology
     */
    protected $technology = null;

    /**
     * Returns the price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param int $price
     * @return void
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the manufactureDate
     *
     * @return \DateTime
     */
    public function getManufactureDate()
    {
        return $this->manufactureDate;
    }

    /**
     * Sets the manufactureDate
     *
     * @param \DateTime $manufactureDate
     * @return void
     */
    public function setManufactureDate(\DateTime $manufactureDate)
    {
        $this->manufactureDate = $manufactureDate;
    }

    /**
     * Returns the warranty
     *
     * @return string
     */
    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * Sets the warranty
     *
     * @param string $warranty
     * @return void
     */
    public function setWarranty(string $warranty)
    {
        $this->warranty = $warranty;
    }

    /**
     * Returns the model
     *
     * @return \NITSAN\NsMobile\Domain\Model\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the model
     *
     * @param \NITSAN\NsMobile\Domain\Model\Model $model
     * @return void
     */
    public function setModel(\NITSAN\NsMobile\Domain\Model\Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns the brand
     *
     * @return \NITSAN\NsMobile\Domain\Model\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets the brand
     *
     * @param \NITSAN\NsMobile\Domain\Model\Brand $brand
     * @return void
     */
    public function setBrand(\NITSAN\NsMobile\Domain\Model\Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
    }

    /**
     * Returns the ram
     *
     * @return string
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Sets the ram
     *
     * @param string $ram
     * @return void
     */
    public function setRam(string $ram)
    {
        $this->ram = $ram;
    }

    /**
     * Returns the technology
     *
     * @return \NITSAN\NsMobile\Domain\Model\Technology
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * Sets the technology
     *
     * @param \NITSAN\NsMobile\Domain\Model\Technology $technology
     * @return void
     */
    public function setTechnology(\NITSAN\NsMobile\Domain\Model\Technology $technology)
    {
        $this->technology = $technology;
    }
}
