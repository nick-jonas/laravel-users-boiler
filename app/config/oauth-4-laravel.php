<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id'     => '1503059159911355',
            'client_secret' => 'ea43a021e2572f0db7e97d09dcebbc23',
            'scope'         => array('email'),
        ),

        'Twitter' => array(
            'client_id'     => '6U5cd0sEAETcp9FjFRtrVqeKi',
            'client_secret' => 'O1Y1fTlZeNQpZJEMPkSlbpAF4TNPFPAJ84uvSfAYgSJWlFtplu',
            // No scope - oauth1 doesn't need scope
        )

    )

);