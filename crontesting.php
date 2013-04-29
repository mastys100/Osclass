<?php

    system("git checkout develop; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("git reset --hard origin/develop; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("git pull origin develop; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("git checkout testing; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("git reset --hard origin/testing; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("git pull origin testing; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("git merge --no-ff develop; echo $?", $rv);
    if($rv!=0) { echo "CRON FAILED"; exit; };

    system("killall firefox-bin");
    system("killall google-chrome");

    system("php oc-includes/simpletest/test/osclass/test_all.php --installer --frontend --admin");

?>