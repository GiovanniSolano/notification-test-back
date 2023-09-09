<?php

namespace App\Enums;

enum NotificationTypeEnum: string
{
    use BaseEnum;

    case SMS = "SMS";
    case Email = "E-Mail";
    case PushNotification = "Push Notification";
}
