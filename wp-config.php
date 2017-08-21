<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'm_loc_2');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`Jo*4c5ci@sj9QN#@4jHE(nmQ87U}btqGL*#$hZq$Yl}b*9[0[W(dK9,BY,Uy*5/');
define('SECURE_AUTH_KEY',  'XG&Z2 TR`SNMmN?<0)-7*W?DM#p/yQQ$?f3/!Zv`+Wa)SdmQ. ]@6%)|dL3FyXI%');
define('LOGGED_IN_KEY',    'NE`D,8~?_dR.J1f7UT7xYV(}GI</z>(rO5^;5e-m>@cLjAw5za,xkBB x4/cQT+b');
define('NONCE_KEY',        'CJDX~[&3Z$~9Lf#!$zVopWS&/<VjX8,h$FP32W84bT$<v`gY}f$)]T)d>v0JS[hj');
define('AUTH_SALT',        'mCYC3=@h)6VRp Shf#Z>io/9dU@dT;+Byw_*4H.]PL,9iI~^uIXlSSdDp?2YsySh');
define('SECURE_AUTH_SALT', '01WC}wEe@0g59UWFk*r*|~$[ynEu qd2^%<=_;Qd5%,d}A.~H-3DwoSbo;1_<dmV');
define('LOGGED_IN_SALT',   '</N)J?NE2|90#TLmlJ252&Z<?L3I)K.ZRHoU#SVK-5?S>Gy*JV*Vc6GT&-qV(4#^');
define('NONCE_SALT',       'K>og5G$=Udc|:k`J/V&5BDK^WZrPCw)z}1SY:[6/+.kUtr+X=k~W*--XBTE;&Y?,');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');