Laravel-Authentication-system
=============================

Authentication system created with Laravel.

Enter database details
======================

You first need to enter your database details in app/config/database.php to be able to store the data.

```
'mysql' => array(
	'driver'    => 'mysql',
	'host'      => 'YOUR DATABASE HOST NAME GOES HERE',
	'database'  => 'YOUR DATABASE NAME GOES HERE',
	'username'  => 'YOUR DATABASE USERNAME GOES HERE',
	'password'  => 'YOUR DATABASE PASSWORD GOES HERE',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
	'port'      => 'THIS IS FOR IF YOU USE A VIRTUAL ENVIRONMENT LIKE LARAVEL HOMESTEAD WHERE THE PORT WOULD NEED TO BE 				33060'
),
```

You then need to migrate the migration files provided in this app into your database using the command line(Git Bash).

```
php artisan migrate
```

Enter your SMTP/Mail details
============================

You need to enter your mail configuration details in app/config/mail.php to be able to send account vertification and password reminder emails to your users.

```
'driver' => 'smtp',

'host' => 'HOST NAME OF YOUR SMTP PROVIDER GOES HERE',

'port' => 'YOUR PORT NUMBER GOES HERE',

'from' => array('address' => 'YOUR EMAIL ADDRESS GOES HERE', 'name' => 'YOUR NAME GOES HERE'),

'username' => 'YOUR EMAIL ACCOUNT USERNAME GOES HERE',

'password' => 'YOUR EMAIL ACCOUNT PASSWORD GOES HERE',
```



