<?php
    $step = "step1";

    if (array_key_exists('step', $_GET)) {
        switch($_GET['step']) {
            case '2':
            case '3':
            case '4':
                $step = 'step' . $_GET["step"];
                break;
        }
    }

    include "header.php";

    if(count($_REQUEST) > 0) {
        // system configuration form
        if ($_REQUEST["action"] === "step1") {
            save_config(array('DEVICE_NAME','DEVICE_PASSWORD','DEVICE_TIMEZONE','DEVICE_COUNTRY_CODE','DEVICE_SSH','DEVICE_LED','DEBUG'));
            run("configure_system");
            load_config();
            array_push($message["success"],"Configuration applied successfully");
        }

        if ($_REQUEST["action"] === "step2") {
            save_config(array('CAMERA_RESOLUTION','CAMERA_ROTATE','CAMERA_FRAMERATE','CAMERA_NIGHT_MODE','MOTION_RECORD_MOVIE','MOTION_THRESHOLD','MOTION_FRAMES','MOTION_EVENT_GAP','MOTION_PROCESS_MOVIE','IVLI_ENABLE','IVLI_TOKEN','IVLI_OBJECT','IVLI_THRESHOLD','IVLI_KEEP_NOT_FOUND'));
            run("configure_camera");
            load_config();
            array_push($message["success"],"Configuration applied successfully");
        }

        if($_REQUEST["action"] === "step3") {
            save_config(array('WIFI_MODE','WIFI_AP_PASSPHRASE','WIFI_CLIENT_SSID','WIFI_CLIENT_PASSPHRASE','NETWORK_IP','NETWORK_GW','NETWORK_DNS','NETWORK_REMOTE_ACCESS','DEVICE_INITIAL_SETUP_COMPLETED'));
            run("configure_network");
            load_config();
            array_push($message["success"],"Configuration applied successfully");
        }
    }

    include "messages.php";
    include "wizard/$step.php";
    include "footer.php"
?>
