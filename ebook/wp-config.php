<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'landingpage' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'lpage' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'Sickterror_2011' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql873.umbler.com' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'y7#!GXP=|M;<CH&uQ,^/cY5jT,Z.]2`nNEc,%H`@t>L_]S?GPgN{l-@*J`NpS.@;' );
define( 'SECURE_AUTH_KEY',  'k/Cr$11~66.s_mz_[23Lf^N%ZJj<kt;k7zjt)TO_.]?v ]/MOCmp=LBmp=}U,w7K' );
define( 'LOGGED_IN_KEY',    'eKfTD)!4=KX@5`~LOc6)FbmWGu+2?B(K:n8P-M@4:el#=Bzj2ztDQ36m^H}Q]So_' );
define( 'NONCE_KEY',        'LL `QsmknzLeF5dF$5J]d(k0aa6{HH=h<3N7^lSY)f[1CuQnj@|yo-XO>bg_gAK`' );
define( 'AUTH_SALT',        'jWihHe4$)/cAE4b7dySl<^:=j1IBz&1jjLRa.!H`5!S-Q [+R(W&OHMC*_Y7k4#7' );
define( 'SECURE_AUTH_SALT', 'Gpjn<0Vci2 %csI$EZdU;Afa%^XK?0GJP8MWkDj)~gXnz j&&K}I^ZSay/,fz9S[' );
define( 'LOGGED_IN_SALT',   '&V~*O6@rm9+&pJrk||GDvTH8zKjp|K`ow}yowUvuzYj<|aEjwmv?+Ba-|69kfR4e' );
define( 'NONCE_SALT',       ')eJH)|lyp!3J1sNSGYv$Q</Gf]zD_WR-k&f6/i}]6nXG[YCC];ON!x[v0F8TZYt`' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
