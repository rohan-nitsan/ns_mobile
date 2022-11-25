<?php
defined('TYPO3') || die();

$GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][700] = 'EXT:ns_mobile/Resources/Private/Templates/Email';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['layoutRootPaths'][700]= 'EXT:ns_mobile/Resources/Private/Layouts';
(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'NsMobile',
        'Mobile',
        [
            \NITSAN\NsMobile\Controller\MobilesController::class => 'list, show, new, create, edit, update, delete, mail',
        ],
        // non-cacheable actions
        [
            \NITSAN\NsMobile\Controller\MobilesController::class => 'list, create, update, delete,',
        ]
    ); 

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ns_mobile/Configuration/PageTSconfig/setup.tsconfig">');
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder