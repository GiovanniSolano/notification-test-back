<?php

namespace App\Models;

use App\Strategies\EmailNotification;
use App\Strategies\PushNotification;
use App\Strategies\SMSNotification;
use App\Traits\CommonRelationshipsTrait;
use App\Traits\ManageFormatDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NotificationType extends Model
{
    use HasFactory, ManageFormatDateTrait, CommonRelationshipsTrait;

    const NOTIFICATION_TYPE_CLASS = [
        'SMS' => SMSNotification::class,
        'E-Mail' => EmailNotification::class,
        'Push Notification' => PushNotification::class,
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_notification_types', 'notification_type_id', 'user_id');
    }

}
