<?php
(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('Access denied.');


$icon = '';
$files = [
    'storage/oauth-private.key' => '0600',
    'storage/oauth-public.key' => '0660',
];

echo "\n";

// Normalize key permissions for Passport 13 (covers both fresh installs and upgrades)
if (PHP_OS_FAMILY !== 'Windows') {

    foreach ($files as $file => $permission) {
        if (file_exists($file)) {
            try {
                @chmod($file, $permission);
                $messages[]['success'] = "Permissions updated to ".$permission." on ".$file." \n";
            } catch (Exception $e) {
                $messages[]['error'] = "Could not change permissions for ".$file.". Please manually change the permissions on this file to ".$permission.". See the documentation: https://snipe-it.readme.io/docs/debugging-permissions#linuxosx \n";
            }
        } else {
            $messages[]['info'] = "The file ".$file." was not found and may not have been created yet. \n";
        }
    }


    if (count($messages) > 0) {

        for($x = 0; $x < count($messages); $x++) {

            foreach ($messages[$x] as $type => $message) {
                if ($type === 'error') {
                    echo " \e[0;97;41m ERROR \e[0m ";
                } elseif ($type === 'info') {
                    echo " \e[0;97;44m INFO \e[0m ";
                } elseif ($type === 'success') {
                    echo " \e[0;97;42m SUCCESS \e[0m ";
                }
                echo $message;
            }
        }

    }

    echo "\n";
    exit();

}

echo " \e[0;97;44m INFO \e[0m Windows OS detected, so OAuth key permissions could not be set. If you have problems with API calls or tables loading in your Snipe-IT application, see the documentation on how to correct them: https://snipe-it.readme.io/docs/debugging-permissions#windows \n";
exit();
