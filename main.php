function getimg($id, $album_id, $token) { // $id - айди владельца альбома. Если владелец это паблик, вначале поставить минус.
    $domain = 'https://api.vk.com';
    $count = json_decode(file_get_contents($domain . '/method/photos.get?owner_id='. $id. '&album_id='.$album_id.'&v=5.81&access_token=' .$noken. '&count=0'), true);
    $randnum = random_int(1, $count['response']['count']);
    $resp = json_decode(file_get_contents($domain . '/method/photos.get?owner_id='. $id. '&album_id='.$album_id.'&v=5.81&access_token=' .$token. '&count=1&offset=' . $randnum), true);
    $arr2= $resp['response']['items']['0']['sizes'];
    $arr3= array();
    foreach ($arr2 as $json) {
        array_push($arr3, $json['height']);
    }
    $max_width = max($arr3);
    foreach ($arr2 as $json) {
        if ($json['height'] == $max_width) {
            return($json['url']);
        }
    }
}
