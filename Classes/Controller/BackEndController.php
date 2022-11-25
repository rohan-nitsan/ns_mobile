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
 * BackEndController
 */

class BackEndController extends \NITSAN\NsMobile\Controller\BaseController
{

    /**
     * mobilesRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\MobilesRepository
     */
    protected $mobilesRepository = null;

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list

     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $mobiles = $this->mobilesRepository->findAll();
        $this->view->assign('mobiles', $mobiles);
        return $this->htmlResponse();
    }
}
