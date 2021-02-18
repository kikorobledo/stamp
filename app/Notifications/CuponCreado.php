<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CuponCreado extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($cupon)
    {
        $this->cupon = $cupon;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Se ha registrado un nuevo cupón por parte de ' . $this->cupon->establecimiento->nombre)
                    ->action('Ver el cupon', route('admin.cupones.edit', $this->cupon));
    }

    /* NOtificaciones en base de datos */
    public function toDatabase($notifiable){
        return[
            'cupon_id' => $this->cupon->id,
            'cupon_nombre' => $this->cupon->nombre,
            'codigos' => $this->cupon->codigos_solicitados,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
