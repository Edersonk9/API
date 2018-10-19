<?php

namespace App;
use NotificationChannels\Gcm\GcmChannel;
use NotificationChannels\Gcm\GcmMessage;
use Illuminate\Notifications\Notification;


use Illuminate\Database\Eloquent\Model;

class GcmMessage extends Notification
{
  public function via($notifiable)
  {
    return [GcmChannel::class];
  }

  public function toGcm($notifiable)
  {
    return GcmMessage::create()
    ->badge(1)
    ->title('Account approved')
    ->message("Your {$notifiable->service} account was approved!");
  }
  public function routeNotificationForGcm()
  {
    return $this->gcm_token;
  }
}
