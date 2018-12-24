<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wp2');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'S){m6^7*PVC}O/W0gk=umf46*8V|bCEH.Vh?F[(OiMZX*FXi-N-b7LH;@}D.#?9Y');
define('SECURE_AUTH_KEY',  'J/4[-s&?;Lj_{39{=hP`/uU]ymeU{aUA<y_v!Ap z&qSx G_*+:T&xEqTh[pbj=0');
define('LOGGED_IN_KEY',    'o!BkuMf8e*Q<M@]U0/+0yg?kT|qRP/0pk28G$Zuawn54|uXGE %MA}W|^aY9xAd]');
define('NONCE_KEY',        'b4)a7+=kJB|11q~l6QO;6?fW!|8`El<O1Uz7ATw5OWRb79jX?7)x}2YZ2;lTs<nH');
define('AUTH_SALT',        '0TgPbr,Xp,8G*g!&|=^1Xt,=58H$?@QyT.dw1P3tnzU}~M}9q+}{HTNkExlk&x i');
define('SECURE_AUTH_SALT', ':Yw&QRp<rJ1G5Dzr@9l.qv8V@e!t2(hMfbO#}$.r2#BbJ5n)a)~US-qYyF=4K*-d');
define('LOGGED_IN_SALT',   't2%6qB}bw!S63R5:?m1hhc2QPP!^.8AI=*tlM<p:Sn9@GZZ]$7?k;-x9M,(_H],o');
define('NONCE_SALT',       'eFehfOcK}c[{[E7&r-;5vzf2el8{:kD)S_>4LPG<Lt9hE?=7F_pj:d&Q,!{0lBy`');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
