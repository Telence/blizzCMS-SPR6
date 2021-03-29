<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Website Name
 *
 * Write the name of your website this will appear by default.
 *
*/
$config['website_name'] = '';

/**
 *
 * Timezone
 *
 * http://php.net/manual/en/timezones.php
 *
*/
$config['timezone'] = 'GMT';

/**
 *
 * Maintenance Mode
 *
 * 1 = Enable | 0 = Disable
 *
*/
$config['maintenance_mode'] = '0';

/**
 *
 * Invitation Discord
 *
 * Write the invitation of your discord channel.
 *
*/
$config['discord_invitation'] = '';

/**
 *
 * Realmlist
 *
 * Write the realmlist used on your server to publish it on the website.
 *
*/
$config['realmlist'] = '';

/**
 *  Bnet enabled?
 * 
 *
 */

$config['bnet_enabled'] = false; // Default: True for Emulators BattleNet and false for not bnetserver

 /**
 *  Emulator
 * 
 *
 *  srp6 = For Emulators (SRP6 Compatibility)
 *  old-trinity =  Trinity Core not SRP6  (Sha_pass_hash Compatibility)
 *  hex = For emulators Mangos  (HEX6 Compatibility)
 *  
 */

$config['emulator'] = 'srp6';

/**
 *
 * Expansion Supported
 *
 * Select the expansion that your website will use among these options:
 *
 * 1 = Vanilla
 * 2 = The Burning Crusade
 * 3 = Wrath of the Lich King
 * 4 = Cataclysm
 * 5 = Mist of Pandaria
 * 6 = Warlords of Draenor
 * 7 = Legion
 * 8 = Battle for Azeroth
 *
*/
$config['expansion'] = '';

/**
 *
 * Theme Name
 *
 * Write the name of your theme
 * The name is the same as the main folder
 * The css must also have the same name
 * Default: default
 *
*/
$config['theme_name'] = 'default';

/**
 *
 * Social Links
 *
 * Write the links for redirect to your social networks.
 *
*/
$config['social_facebook'] = '';
$config['social_twitter'] = '';
$config['social_youtube'] = '';

/**
 *
 * Migrate Status
 *
 * Warning: Don't change this configuration.
 *
*/
$config['migrate_status'] = '1';
