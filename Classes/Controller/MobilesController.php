<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Controller;

use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Core\Pagination\ArrayPaginator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;

/**
 * This file is part of the "NS Mobile" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Rohan Parmar <rohan.nitsan@gmail.com>, NITSAN Technologies
 */

/**
 * MobilesController
 */
class MobilesController extends \NITSAN\NsMobile\Controller\BaseController
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
     *
     * @param int $currentPage
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction($currentPage = 1): \Psr\Http\Message\ResponseInterface
    {
        $postMethodData = GeneralUtility::_POST();

        // debug($_REQUEST);die;
        if ($postMethodData) {
            if ($postMethodData['brand'] == 'All' && $postMethodData['model'] == 'All' && $postMethodData['technology'] == 'All') {
                $data = $this->mobilesRepository->findAll();
            } else {
                if ($postMethodData['brand'] != 'All' && $postMethodData['model'] == 'All') {
                    $data = $this->mobilesRepository->filterBrand($postMethodData['brand'], $postMethodData['technology']);
                } else {
                    if ($postMethodData['brand'] == 'All' && $postMethodData['model'] != 'All') {
                        $data = $this->mobilesRepository->filterModel($postMethodData['model'], $postMethodData['technology']);
                    } else {
                        if ($postMethodData['brand'] == 'All' && $postMethodData['model'] == 'All') {
                            $data = $this->mobilesRepository->filterTechnology($postMethodData['technology'], $postMethodData['technology']);
                        } else {
                            if ($postMethodData['brand'] != 'All' && $postMethodData['model'] != 'All') {
                                $data = $this->mobilesRepository->filterBrandModel($postMethodData['brand'], $postMethodData['model'], $postMethodData['technology']);
                            }
                        }
                    }
                }
            }
        } else {
            $data = $this->mobilesRepository->findAll();
        }
        if ($this->settings) {
            if ((int) $this->settings['itemsPerPage'] <= 0) {
                $itemsPerPage = 5;
            } else {
                $itemsPerPage = (int) $this->settings['itemsPerPage'];
            }
        } else {
            $itemsPerPage = 1;
        }
        $itemsToBePaginated = $data->toArray();
        $paginator = new ArrayPaginator($itemsToBePaginated, $currentPage, $itemsPerPage);
        $paging = new SimplePagination($paginator);
        $brand = $this->brandRepository->findAll();
        $technology = $this->technologyRepository->findAll();
        $model = [];
        $selectedBrand = $selectedModel = $selectedTechnology = "";
        if ($postMethodData) {
            $model = $this->modelRepository->findByBrand($postMethodData['brand']);
            $selectedBrand = $postMethodData['brand'];
            $selectedModel = $postMethodData['model'];
            $selectedTechnology = $postMethodData['technology'];
        }
        $assignedValues = [
            'pagination' => [
                'currentPage' => $currentPage,
                'paginator' => $paginator
            ],
            'pages' => range(1, $paging->getLastPageNumber()),
            'brands' => $brand,
            'technology' => $technology,
            'model' => $model,
            'selectedBrand' => $selectedBrand,
            'selectedModel' => $selectedModel,
            'selectedTechnology' => $selectedTechnology
        ];
        $this->view->assignMultiple($assignedValues);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobiles $mobiles
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\NITSAN\NsMobile\Domain\Model\Mobiles $mobiles): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('mobiles', $mobiles);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        $brand = $this->brandRepository->findAll();
        $technology = $this->technologyRepository->findAll();
        $model = $this->modelRepository->findAll();
        $this->view->assignMultiple(
            [
                'brands' => $brand,
                'technology' => $technology,
                'model' => $model
            ]
        );
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobiles $newMobiles
     */
    public function createAction(\NITSAN\NsMobile\Domain\Model\Mobiles $newMobiles)
    {
        $this->addFlashMessage('New Mobile Added Successful.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->mobilesRepository->add($newMobiles);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobiles $mobiles
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("mobiles")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\NITSAN\NsMobile\Domain\Model\Mobiles $mobiles): \Psr\Http\Message\ResponseInterface
    {
        $brand = $this->brandRepository->findAll();
        $technology = $this->technologyRepository->findAll();
        $model = $this->modelRepository->findAll();
        $this->view->assignMultiple(
            [
                'mobiles' => $mobiles,
                'brands' => $brand,
                'technology' => $technology,
                'model' => $model
            ]
        );
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobiles $mobiles
     */
    public function updateAction(\NITSAN\NsMobile\Domain\Model\Mobiles $mobiles)
    {
        $this->addFlashMessage('The Mobile Successfully Updated.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::INFO);
        $this->mobilesRepository->update($mobiles);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobiles $mobiles
     */
    public function deleteAction(\NITSAN\NsMobile\Domain\Model\Mobiles $mobiles)
    {
        $this->addFlashMessage('The Mobile Successfullty Deleted.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->mobilesRepository->remove($mobiles);
        $this->redirect('list');
    }


    public function mailAction()
    {
        $formData = GeneralUtility::_POST();
        $name= $formData['fname'].' '.$formData['lname'];
        $senderEmail = $formData['email'];
        $senderMobileNo = $formData['mobile'];
        $message = $formData['message'];
        $mobileData = $this->mobilesRepository->getMobileByUID($formData['mobileUid']);
        $email = GeneralUtility::makeInstance(FluidEmail::class);
        $email 
            ->to('inquiry@ns_mobile.com')
            ->from(new Address($senderEmail,$name))
            ->subject('Mobile Inquiry')
            ->format(FluidEmail::FORMAT_BOTH)
            ->setTemplate('Email')
            ->assign('senderName', $name)
            ->assign('senderEmail', $senderEmail)
            ->assign('senderMobileNo', $senderMobileNo)
            ->assign('message', $message)
            ->attachFromPath($formData['imagePath'], 'Product Image')
            ->assign('mobileData',$mobileData);
        GeneralUtility::makeInstance(Mailer::class)->send($email);
    }
}
