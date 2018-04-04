<?php

require_once 'invoiceme.civix.php';

/**
 * Implements hook_civicrm_post().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_post
 */
function invoiceme_civicrm_post($op, $objectName, $objectId, &$objectRef) {
  if ($op == 'create' && $objectName == 'Contribution' && $objectRef->is_pay_later == 1 && $objectRef->contribution_status_id == 2 && !empty($objectRef->contact_id)) {
    $baseUrl = CRM_Utils_System::baseURL();
    $link = CRM_Utils_System::href(
      '<i class="crm-i fa-print"></i> Print Invoice', "civicrm/contribute/invoice", "reset=1&id={$objectId}", TRUE, NULL, TRUE, TRUE, FALSE
    );
    $link = substr_replace($link, "<a class='iron-button print'", 0, 2);
    CRM_Core_Session::setStatus("$link", '', 'alert');
  }
}

function invoiceme_civicrm_buildForm($formName, &$form) {
  if ($formName == "CRM_Contribute_Form_Contribution_ThankYou") {
    CRM_Core_Resources::singleton()->addStyleFile('com.aghstrategies.invoiceme', 'css/notice.css', 1, 'html-header');
  }
}


/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function invoiceme_civicrm_config(&$config) {
  _invoiceme_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function invoiceme_civicrm_xmlMenu(&$files) {
  _invoiceme_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function invoiceme_civicrm_install() {
  _invoiceme_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function invoiceme_civicrm_postInstall() {
  _invoiceme_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function invoiceme_civicrm_uninstall() {
  _invoiceme_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function invoiceme_civicrm_enable() {
  _invoiceme_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function invoiceme_civicrm_disable() {
  _invoiceme_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function invoiceme_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _invoiceme_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function invoiceme_civicrm_managed(&$entities) {
  _invoiceme_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function invoiceme_civicrm_caseTypes(&$caseTypes) {
  _invoiceme_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function invoiceme_civicrm_angularModules(&$angularModules) {
  _invoiceme_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function invoiceme_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _invoiceme_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function invoiceme_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function invoiceme_civicrm_navigationMenu(&$menu) {
  _invoiceme_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'com.aghstrategies.invoiceme')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _invoiceme_civix_navigationMenu($menu);
} // */
