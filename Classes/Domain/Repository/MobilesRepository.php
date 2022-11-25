<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Domain\Repository;


/**
 * This file is part of the "NS Mobile" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Rohan Parmar <rohan.nitsan@gmail.com>, NITSAN Technologies
 */

/**
 * The repository for Mobiles
 */
class MobilesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * action filterBrand
     *
     * @param $brand string
     * @param $technology string
     * @return $result QueryResult
     */
    public function filterBrand($brand, $technology)
    {
        $query = $this->createQuery();
        if ($technology == 'All') {
            $query->matching($query->equals('brand', $brand));
        } else {
            $query->matching(
            $query->logicalAnd(
            [
            $query->equals('brand', $brand),
            $query->equals('technology', $technology)
            ]
            )
            );
        }
        return $query->execute();
    }

    /**
     * action filterModel
     *
     * @param $model string
     * @param $technology string
     * @return $result QueryResult
     */
    public function filterModel($model, $technology)
    {
        $query = $this->createQuery();
        if ($technology == "All") {
            $query->matching($query->equals('model', $model));
        } else {
            $query->matching(
            $query->logicalAnd(
            [
            $query->equals('model', $model),
            $query->equals('technology', $technology)
            ]
            )
            );
        }
        return $query->execute();
    }

    /**
     * action filterTechnology
     *
     * @param $technology string
     * @return $result QueryResult
     */
    public function filterTechnology($technology)
    {
        $query = $this->createQuery();
        $query->matching($query->equals('technology', $technology));
        return $query->execute();
    }

    /**
     * action filterBrandModel
     *
     * @param $brand string
     * @param $model string
     * @param $technology string
     * @return $result QueryResult
     */
    public function filterBrandModel($brand, $model, $technology)
    {
        $query = $this->createQuery();
        if ($technology == 'All') {
            $query->matching(
            $query->logicalAnd(
            [
            $query->equals('brand', $brand),
            $query->equals('model', $model)
            ]
            )
            );
        } else {
            $query->matching(
            $query->logicalAnd(
            [
            $query->equals('brand', $brand),
            $query->equals('model', $model),
            $query->equals('technology', $technology)
            ]
            )
            );
        }
        return $query->execute();
    }

    /**
     * action getMobileByUID
     *
     * @param $uid int
     * @return $result QueryResult
     */
    public function getMobileByUID($uid)
    {
        $query = $this->createQuery();
        $query->matching($query->equals('uid', $uid));
        return $query->execute();
    }
}
