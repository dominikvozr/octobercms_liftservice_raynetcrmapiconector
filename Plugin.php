<?php namespace Dondo\RaynetcrmApiConector;

use Event;
use Mail;
use RainLab\User\Facades\Auth;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        // subscribe to events
        Event::listen('review.created', function ($data) {
            // TODO push to CRM

            Mail::send('dondo.raynetcrmapiconector::mail.review_message', $data, function ($message) {
                $message->to('pevajev276@probdd.com', 'Admin Person');
                $message->subject('Zásah od používateľa ' . Auth::getUser()->name . ' bol vykonaný');
            });
        });

        Event::listen('service.created', function ($data) {
            // TODO push to CRM

            Mail::send('dondo.raynetcrmapiconector::mail.service_message', $data, function ($message) {
                $message->to('pevajev276@probdd.com', 'Admin Person');
                $message->subject('Servis od používateľa ' . Auth::getUser()->name . ' bol vykonaný');
            });
        });
    }

    public function registerComponents()
    {

    }

    public function registerSettings()
    {
    }
    public function registerMailTemplates()
    {
        return [
            'dondo.raynetcrmapiconector::mail.review_message',
            'dondo.raynetcrmapiconector::mail.service_message'
        ];
    }
}
