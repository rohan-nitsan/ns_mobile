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
 * Accessories
 */
class Accessories extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * model
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NITSAN\NsMobile\Domain\Model\Model>
     */
    protected $model = null;

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
        $this->model = $this->model ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Adds a Model
     *
     * @param \NITSAN\NsMobile\Domain\Model\Model $model
     * @return void
     */
    public function addModel(\NITSAN\NsMobile\Domain\Model\Model $model)
    {
        $this->model->attach($model);
    }

    /**
     * Removes a Model
     *
     * @param \NITSAN\NsMobile\Domain\Model\Model $modelToRemove The Model to be removed
     * @return void
     */
    public function removeModel(\NITSAN\NsMobile\Domain\Model\Model $modelToRemove)
    {
        $this->model->detach($modelToRemove);
    }

    /**
     * Returns the model
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NITSAN\NsMobile\Domain\Model\Model>
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the model
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NITSAN\NsMobile\Domain\Model\Model> $model
     * @return void
     */
    public function setModel(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $model)
    {
        $this->model = $model;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
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
}
