<?php

return call_user_func(function () {
    $config = require __DIR__.'/../config.php';
    $apiKey = $config['sched']['api-key'];
    $url    = 'http://techmeetupuy2014.sched.org/api/session/export?api_key='.$apiKey.'&format=json&fields=name,event_type,event_start_time&strip_html=Y';
    $result = json_decode(@file_get_contents($url, false, stream_context_create(array(
        'http' => array(
            'method'           => "GET",
            'protocol_version' => 1.0,
            'timeout'          => 1,
            'user_agent'       => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36',
            'header'           => implode("\r\n", array(
                'Content-Type: application/json',
                'Accept: application/json',
            )),
        )
    ))), true);

    if (!$result) {
        return null;
    }

    $result = array_filter($result, function ($workshop) {
        return isset($workshop['event_type']) && 'workshop' === $workshop['event_type'];
    });

    $workshopSettings = array();

    foreach ($result as $workshop) {
        if (!isset($workshopSettings[$workshop['event_start_time']])) {
            $workshopSettings[$workshop['event_start_time']] = array();
        }

        $workshopSettings[$workshop['event_start_time']][] = $workshop['name'];
    }

    return $workshopSettings;
});
