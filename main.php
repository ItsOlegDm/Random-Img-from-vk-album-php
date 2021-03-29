<?
$token = '';
$owner_id = '';// перед id поставить минус, если это айди группы. 
$album_id = '';

$arr = json_decode(file_get_contents('https://api.vk.com/method/photos.get?owner_id=' . $owner_id . '&album_id=' . $album_id . '&v=5.37&access_token=' . $token), true);
$rand_keys = array_rand($arr['response']['items']);
$delete_keys = array('album_id', 'date', 'id', 'owner_id', 'has_tags', 'height', 'text', 'user_id', 'width');
$arr = array_diff_key($arr['response']['items'][$rand_keys], array_flip($delete_keys));
sort($arr,SORT_NATURAL);
$img = array_pop($arr);

echo $img;
