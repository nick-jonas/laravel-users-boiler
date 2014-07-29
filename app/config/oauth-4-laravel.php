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
            'client_id'     => '321953977968313',
            'client_secret' => 'd45593e395edd5806c7ba090d4cffa18',
            'scope'         => array('email'),
        ),

        'Twitter' => array(
            'client_id'     => '6U5cd0sEAETcp9FjFRtrVqeKi',
            'client_secret' => 'O1Y1fTlZeNQpZJEMPkSlbpAF4TNPFPAJ84uvSfAYgSJWlFtplu',
            // No scope - oauth1 doesn't need scope
        )

    )

);