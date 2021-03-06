<?php
/**
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'demandedevis` (
    `id_demandeDevis` int(11) NOT NULL AUTO_INCREMENT,
    `id_client` int(11) NOT NULL,
    `id_reponse_question` int(11) NOT NULL,
    `prix_total` float,
    PRIMARY KEY  (`id_demandeDevis`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'demandeDevisQuestionaire` (
    `id_questionnaireDevis` int(11) NOT NULL AUTO_INCREMENT,
    `id_produit` int(11) NOT NULL,
    PRIMARY KEY  (`id_questionnaireDevis`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'demandeDevisquestionaire_lang` (
  `id_questionnaireDevis` int(11) NOT NULL auto_increment,
  `id_lang` int(11) NOT NULL ,
  `libelle` text NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id_questionnaireDevis`,`id_lang`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'demandeDevisReponse` (
    `id_reponse_question` int(11) NOT NULL AUTO_INCREMENT,
    `id_questionnaireDevis` int(11) NOT NULL,
    PRIMARY KEY  (`id_reponse_question`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'demandeDevisReponse_lang` (
  `id_reponse_question` int(11) NOT NULL auto_increment,
  `id_lang` int(11) NOT NULL ,
  `libelle` text NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id_reponse_question`,`id_lang`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
