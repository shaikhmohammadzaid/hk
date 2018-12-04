<?php return array (
  'app' => 
  array (
    'name' => 'HouseKeeping',
    'env' => 'production',
    'debug' => true,
    'url' => 'http://192.168.10.221/hk',
    'timezone' => 'Asia/Kolkata',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:WK9PAGa4EpA0IXjIreWbLjK4eKpjP46cK5qPq2jL5eA=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'debug',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
    ),
    'debug_blacklist' => 
    array (
      '_COOKIE' => 
      array (
      ),
      '_SERVER' => 
      array (
        0 => 'ACLOCAL_PATH',
        1 => 'ALLUSERSPROFILE',
        2 => 'APPDATA',
        3 => 'ChocolateyInstall',
        4 => 'ChocolateyLastPathUpdate',
        5 => 'COMMONPROGRAMFILES',
        6 => 'COMPUTERNAME',
        7 => 'COMSPEC',
        8 => 'CONFIG_SITE',
        9 => 'DISPLAY',
        10 => 'EXEPATH',
        11 => 'FP_NO_HOST_CHECK',
        12 => 'HOME',
        13 => 'HOMEDRIVE',
        14 => 'HOMEPATH',
        15 => 'HOSTNAME',
        16 => 'INFOPATH',
        17 => 'LANG',
        18 => 'LOCALAPPDATA',
        19 => 'LOGONSERVER',
        20 => 'MANPATH',
        21 => 'MINGW_CHOST',
        22 => 'MINGW_PACKAGE_PREFIX',
        23 => 'MINGW_PREFIX',
        24 => 'MSYSTEM',
        25 => 'MSYSTEM_CARCH',
        26 => 'MSYSTEM_CHOST',
        27 => 'MSYSTEM_PREFIX',
        28 => 'NUMBER_OF_PROCESSORS',
        29 => 'ORIGINAL_PATH',
        30 => 'ORIGINAL_TEMP',
        31 => 'ORIGINAL_TMP',
        32 => 'OS',
        33 => 'PATH',
        34 => 'PATHEXT',
        35 => 'PKG_CONFIG_PATH',
        36 => 'PLINK_PROTOCOL',
        37 => 'PROCESSOR_ARCHITECTURE',
        38 => 'PROCESSOR_IDENTIFIER',
        39 => 'PROCESSOR_LEVEL',
        40 => 'PROCESSOR_REVISION',
        41 => 'ProgramData',
        42 => 'PROGRAMFILES',
        43 => 'PS1',
        44 => 'PSModulePath',
        45 => 'PUBLIC',
        46 => 'PWD',
        47 => 'SESSIONNAME',
        48 => 'SHELL',
        49 => 'SHLVL',
        50 => 'SSH_ASKPASS',
        51 => 'SYSTEMDRIVE',
        52 => 'SYSTEMROOT',
        53 => 'TEMP',
        54 => 'TMP',
        55 => 'TMPDIR',
        56 => 'USERDOMAIN',
        57 => 'USERNAME',
        58 => 'USERPROFILE',
        59 => 'WINDIR',
        60 => 'windows_tracing_flags',
        61 => 'windows_tracing_logfile',
        62 => '_',
        63 => 'PHP_SELF',
        64 => 'SCRIPT_NAME',
        65 => 'SCRIPT_FILENAME',
        66 => 'PATH_TRANSLATED',
        67 => 'DOCUMENT_ROOT',
        68 => 'APP_NAME',
        69 => 'APP_ENV',
        70 => 'APP_KEY',
        71 => 'APP_DEBUG',
        72 => 'APP_LOG_LEVEL',
        73 => 'APP_URL',
        74 => 'DB_CONNECTION',
        75 => 'DB_HOST',
        76 => 'DB_PORT',
        77 => 'DB_DATABASE',
        78 => 'DB_USERNAME',
        79 => 'DB_PASSWORD',
        80 => 'BROADCAST_DRIVER',
        81 => 'CACHE_DRIVER',
        82 => 'SESSION_DRIVER',
        83 => 'SESSION_LIFETIME',
        84 => 'QUEUE_DRIVER',
        85 => 'REDIS_HOST',
        86 => 'REDIS_PASSWORD',
        87 => 'REDIS_PORT',
        88 => 'MAIL_DRIVER',
        89 => 'MAIL_HOST',
        90 => 'MAIL_PORT',
        91 => 'MAIL_USERNAME',
        92 => 'MAIL_PASSWORD',
        93 => 'MAIL_ENCRYPTION',
        94 => 'PUSHER_APP_ID',
        95 => 'PUSHER_APP_KEY',
        96 => 'PUSHER_APP_SECRET',
        97 => 'PUSHER_APP_CLUSTER',
      ),
      '_ENV' => 
      array (
        0 => 'APP_NAME',
        1 => 'APP_ENV',
        2 => 'APP_KEY',
        3 => 'APP_DEBUG',
        4 => 'APP_LOG_LEVEL',
        5 => 'APP_URL',
        6 => 'DB_CONNECTION',
        7 => 'DB_HOST',
        8 => 'DB_PORT',
        9 => 'DB_DATABASE',
        10 => 'DB_USERNAME',
        11 => 'DB_PASSWORD',
        12 => 'BROADCAST_DRIVER',
        13 => 'CACHE_DRIVER',
        14 => 'SESSION_DRIVER',
        15 => 'SESSION_LIFETIME',
        16 => 'QUEUE_DRIVER',
        17 => 'REDIS_HOST',
        18 => 'REDIS_PASSWORD',
        19 => 'REDIS_PORT',
        20 => 'MAIL_DRIVER',
        21 => 'MAIL_HOST',
        22 => 'MAIL_PORT',
        23 => 'MAIL_USERNAME',
        24 => 'MAIL_PASSWORD',
        25 => 'MAIL_ENCRYPTION',
        26 => 'PUSHER_APP_ID',
        27 => 'PUSHER_APP_KEY',
        28 => 'PUSHER_APP_SECRET',
        29 => 'PUSHER_APP_CLUSTER',
      ),
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'admins',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Admin',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
      'admins' => 
      array (
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '\\\\ZAID\\HK\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'housekeeping_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'hk',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'hk',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'hk',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'hk',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
    ),
    'index_column' => 'DT_Row_Index',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => '%s %s NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '\\\\ZAID\\HK\\storage\\app',
      ),
      'emp_task_image' => 
      array (
        'driver' => 'local',
        'root' => '\\\\ZAID\\HK\\public\\emp_task_image',
      ),
      'emp_service_image' => 
      array (
        'driver' => 'local',
        'root' => '\\\\ZAID\\HK\\public\\emp_service_image',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '\\\\ZAID\\HK\\storage\\app/public',
        'url' => 'http://192.168.10.221/hk/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'dharit.creart@gmail.com',
      'name' => 'Cash Operator',
    ),
    'encryption' => 'tls',
    'username' => 'abcd1b3519c745',
    'password' => '53e77975f7e605',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '\\\\ZAID\\HK\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => true,
    'encrypt' => false,
    'files' => '\\\\ZAID\\HK\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'housekeeping_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '\\\\ZAID\\HK\\resources\\views',
    ),
    'compiled' => '\\\\ZAID\\HK\\storage\\framework\\views',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'dont_alias' => 
    array (
    ),
  ),
);
