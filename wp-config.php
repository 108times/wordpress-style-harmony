<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'style_harmony' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sgoqX)7T?t].c/h& JnP#yZGHdYTGOfzEv{]2<iwZq&~[JiJOjifG,70-)NBdkCp' );
define( 'SECURE_AUTH_KEY',  'a >YJ|D7kk]y7)(p62.mQKg=3$:2oajB$a39NakNwV7W<Bl%#A34*`1@*BatH_id' );
define( 'LOGGED_IN_KEY',    '4;JgxX/w8X0x%dRj=mBuk3=/$*6, DR|z>88aO>AB_0Y]m$F=H/<XLU5K%-Yj#Q:' );
define( 'NONCE_KEY',        'A%mn=&;#FI7gGOLQsCkGkSr<0 9EC#D`:_r&}p%;E8fQo|?m-] Cho4mzBr/SJ](' );
define( 'AUTH_SALT',        'Npd&57mYD0s0ok$$El q&M!l)?PfsD|/X|Sz!SxQvPEci%K25sxVc^-c4 F5zhGs' );
define( 'SECURE_AUTH_SALT', ' 6{JU2=FTRD}7qJOJ^2U^?[~=.{~Hyr> <[7wp1c[PlpT2YZWI>`SH*fIe!lUQpU' );
define( 'LOGGED_IN_SALT',   'oH$XKs x@5j2UZt~]?OZDuk./!0h>py4QSNR5^%,!$pEU~1yB)45,ryqDTp8G5pR' );
define( 'NONCE_SALT',       '0m>oq~O(l5rVOCUq^Pf,-_X/8z&[S5xJUT!qVGu.[S2Q>q|>DNL:b3BjZaIjWpdL' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
