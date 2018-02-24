<?php
namespace App\Customs;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Mail\TransportManager;
use App\setting_email; 

class CustomTransportManager extends TransportManager {

    /**
     * Create a new manager instance.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;

        if( $settings = setting_email::find(1) ){

            $this->app['config']['mail'] = [
                'driver'        => $settings->driver,
                'host'          => $settings->host,
                'port'          => $settings->port,
                'from'          => [
                'address'   => $settings->email,
                'name'      => $settings->from_name
                ],
                'encryption'    => $settings->encryption,
                'username'      => $settings->email,
                'password'      => decrypt($settings->password)

           ];
           


       }

    }
}