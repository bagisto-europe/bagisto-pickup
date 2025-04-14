<?php

namespace Bagisto\Pickup\Mail\Shop\Order;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Webkul\Sales\Contracts\Shipment;
use Webkul\Shop\Mail\Mailable;

class PickupNotification extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Shipment $shipment) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: [
                new Address(
                    $this->shipment->order->customer_email,
                    $this->shipment->order->customer_full_name
                ),
            ],
            subject: trans('pickup::app.shop.emails.orders.pickup.ready_subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pickup::shop.emails.orders.pickup',
        );
    }
}
