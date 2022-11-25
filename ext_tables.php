<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'NsMobile',
        'web',
        'back1',
        '',
        [
            \NITSAN\NsMobile\Controller\BackEndController::class => 'list, show, new, create, edit, update, delete, mail',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:ns_mobile/Resources/Public/Icons/user_mod_back1.svg',
            'labels' => 'LLL:EXT:ns_mobile/Resources/Private/Language/locallang_back1.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nsmobile_domain_model_mobiles', 'EXT:ns_mobile/Resources/Private/Language/locallang_csh_tx_nsmobile_domain_model_mobiles.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nsmobile_domain_model_mobiles');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nsmobile_domain_model_brand', 'EXT:ns_mobile/Resources/Private/Language/locallang_csh_tx_nsmobile_domain_model_brand.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nsmobile_domain_model_brand');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nsmobile_domain_model_accessories', 'EXT:ns_mobile/Resources/Private/Language/locallang_csh_tx_nsmobile_domain_model_accessories.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nsmobile_domain_model_accessories');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nsmobile_domain_model_model', 'EXT:ns_mobile/Resources/Private/Language/locallang_csh_tx_nsmobile_domain_model_model.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nsmobile_domain_model_model');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nsmobile_domain_model_technology', 'EXT:ns_mobile/Resources/Private/Language/locallang_csh_tx_nsmobile_domain_model_technology.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nsmobile_domain_model_technology');
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder