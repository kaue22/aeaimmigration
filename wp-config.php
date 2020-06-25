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
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/aeaimmigration.com.br/public/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'aeaimmigration' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'aeaimmigration' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '2OT_O7YXWb+r' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql873.umbler.com' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         ' brX:cACpa q}s!Qax0l_%.;F0|d*zR|HQedz%l!vo`ZofWj_DuI.:xWiKr=51/Q' );
define( 'SECURE_AUTH_KEY',  'v*zi:uGE6$p&!Gi<,zUQ>oW#h7Xiwu T|c)T3rB0E2YOTobXWvR$wOqGw1z^8/Dn' );
define( 'LOGGED_IN_KEY',    'SJ3JiPZ/{hteb&jh(Em;<3lQ0r>h*OVaMtx`(%%+,72qb;0puE:zp?c$Rc(:s4=c' );
define( 'NONCE_KEY',        'wQ0`~+}e.OBDH?Z,V.t0.Rj{6$~NE=8Vfj)NVE7<JIxXP?2)!Vpj&`}4il9M*:l;' );
define( 'AUTH_SALT',        '-_wkL{?p.9C(8&UHRm@i&ntuAv9SP.w7t&A%GjPf{+x&oz4=p~2Xw.|7i JWAz:0' );
define( 'SECURE_AUTH_SALT', 'i|pu_rW8bq(g`8s[Y]&#T#=))phfg5<J#Dgg#B^M/jrVL!x+5CNiZ]Nx=:&Hxk(1' );
define( 'LOGGED_IN_SALT',   '{1ZDW,]RXucJO+NrZxjVwh3cq)27B|BSz)5ufUd<g>^U5b`=WZaY {?fHuJL!.md' );
define( 'NONCE_SALT',       'Z(lXoe@2CV6jf(b-D~]5d-6,e7|O]gz)f8wP:m (>j7!!l(ee@L])`*]<{&Z!l@I' );

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
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');

define('COOKIE_DOMAIN',false);
