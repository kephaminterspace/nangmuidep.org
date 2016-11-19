<?php
    $arr = array(
        'properties' => array(
            array(
                'property' => 'email',
                'value' => $_GET['email']
            ),
            array(
                'property' => 'firstname',
                'value' => $_GET['name']
            ),
            array(
                'property' => 'lastname',
                'value' => ''
            ),
            array(
                'property' => 'phone',
                'value' => $_GET['phone']
            ),
            array(
                'property' => 'dichvu',
                'value' => $_GET['dichvu']
            ),
            array(
                'property' => 'hs_lead_status',
                'value' => "NEW"
            )
        )
    );

    $post_json = json_encode($arr);

    $endpoint = "https://api.hubapi.com/contacts/v1/contact/?hapikey=707c5382-1bd3-4947-84fc-021c860a83f5";
    $ch = @curl_init();
    @curl_setopt($ch, CURLOPT_POST, true);
    @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
    @curl_setopt($ch, CURLOPT_URL, $endpoint);
    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = @curl_exec($ch);
    $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_errors = curl_error($ch);
    @curl_close($ch);

    if ($status_code == 200) {
        $msg = 'success';
    }else{
        $msg = 'error';
    }

    echo $msg;

