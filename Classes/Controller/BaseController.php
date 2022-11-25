<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Controller;


/**
 * This file is part of the "NS Mobile" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Rohan Parmar <rohan.nitsan@gmail.com>, NITSAN Technologies
 */

/**
 * BrandController
 */
class BaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController{

    /**
     * brandRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\BrandRepository
     */
    protected $brandRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\BrandRepository $brandRepository
     */
    public function injectBrandRepository(\NITSAN\NsMobile\Domain\Repository\BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * mobilesRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\MobilesRepository
     */
    protected $mobilesRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\MobilesRepository $mobilesRepository
     */
    public function injectMobilesRepository(\NITSAN\NsMobile\Domain\Repository\MobilesRepository $mobilesRepository)
    {
        $this->mobilesRepository = $mobilesRepository;
    }


    /**
     * modelRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\ModelRepository
     */
    protected $modelRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\ModelRepository $modelRepository
     */
    public function injectModelRepository(\NITSAN\NsMobile\Domain\Repository\ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }


    /**
     * technologyRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\TechnologyRepository
     */
    protected $technologyRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\TechnologyRepository $technologyRepository
     */
    public function injectTechnologyRepository(\NITSAN\NsMobile\Domain\Repository\TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }

    /**
     * accessoriesRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\AccessoriesRepository
     */
    protected $accessoriesRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\AccessoriesRepository $accessoriesRepository
     */
    public function injectAccessoriesRepository(\NITSAN\NsMobile\Domain\Repository\AccessoriesRepository $accessoriesRepository)
    {
        $this->accessoriesRepository = $accessoriesRepository;
    }
}