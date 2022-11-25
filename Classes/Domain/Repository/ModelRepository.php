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
 * The repository for Models
 */
class ModelRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * action filterBrandModel
     *
     * @param $brand string
     * @return $result QueryResult
     */
    public function findByBrand($brand)
    {
        $query = $this->createQuery();
        $query->matching(
        $query->logicalAnd([$query->equals('brand', $brand)])
        );
        return $query->execute();
    }
}
