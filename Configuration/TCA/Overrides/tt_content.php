<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'NsMobile',
    'Mobile',
    'NS MOBILE'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['nsmobile_mobile']='layout,select_key,recursive';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['nsmobile_mobile']='pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'nsmobile_mobile',
    'FILE:EXT:ns_mobile/Configuration/FlexForms/SettingsForm.xml'
);