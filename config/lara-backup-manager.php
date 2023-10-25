<?php

return [

    #-------------------------------------------------------------------
    # Route where BackupManager will be available in your app.
    'route' => 'lara-backup-manager',
    #-------------------------------------------------------------------

    #-------------------------------------------------------------------
    # If "true", the BackupManager page can be viewed by any user who provides
    'http_authentication' => false,
    #-------------------------------------------------------------------

    #-------------------------------------------------------------------
    # define binary paths
    'paths' => [
        'mysql' => 'mysql',
        'mysqldump' => 'mysqldump',
        'tar' => 'tar',
        'zcat' => 'zcat',
    ],
    #-------------------------------------------------------------------

    #-------------------------------------------------------------------
    # define backup options
    'backups' => [

        'database' => [
            // enable or disable database backup
            'enable' => false,
            // include tables that need to be backed up. LEAVE EMPTY FOR ALL TABLES
            'tables' => [

            ],
        ],

        'files' => [
            // enable or disable files backup
            'enable' => true,
            // include folders that need to be backed up
            'folders' => [
                base_path('app'),
                base_path('bootstrap'),
                base_path('config'),
                base_path('database'),
                base_path('public'),
                base_path('resources'),
                //base_path('storage'),
                base_path('tests'),
                //base_path('vendor'),

                //list all root files available in your project
                base_path('.env.example'),
                base_path('composer.json'),
                base_path('package.json'),
                base_path('artisan'),

            ],
        ],

        // define disk options, or use custom-http
        'disk' => 'custom-http', // any disk from config/filesystems.php like local, ftp, s3, etc
        'backup_path' => 'backups',

        // backup files name suffix
        'backup_file_date_suffix' => 'M-d-Y-H-i-s',

        // define number of days old backup files will be deleted before new backup
        'delete_old_backup_days' => 10,

        //Only applies if disk is set to custom_http
        'custom_http' => [
            'url' => 'https://backup.queek.com.ng/api/v1/backup/store',
            'fallback_disk' => 'local', //set fallback disk if http fails
            'api_key' => '9845e520-178d-48c7-88b2-d03b1fcd32ae'//if requires api_key
        ]
    ],

    /*
     * Mail settings
     */
    'mail' => [
        /*
         * Define mail subject and who should receive mails when backup is taken/restored.
         * Leave "mail_receivers" empty [] to not send any mail.
         */
        'mail_subject' => 'Lara BackupManager Alert',
        'mail_receivers' => ['admin@example.com'],
    ],

];
