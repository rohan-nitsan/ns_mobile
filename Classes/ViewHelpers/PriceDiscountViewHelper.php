<?php
// File: /typo3conf/ext/extension_key/Classes/ViewHelpers/MystyleViewHelper.php

namespace NITSAN\NsMobile\ViewHelpers;

use \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;


class PriceDiscountViewHelper extends AbstractViewHelper
{
    /**
     * initialize
     *
     */
    public function initializeArguments()
    {
        $this->registerArgument('price', 'integer', 'Price', true);
        $this->registerArgument('discount', 'integer', 'Discount', true);
    }
    /**
     * render inline text
     * @param array $attributes attributes to add
     * @return string content
     */
    public function render()
    { 
        $content = (int)$this->arguments['price']-(((int)$this->arguments['price']*(int)$this->arguments['discount'])/100);
        return $content;
    }
}
?>