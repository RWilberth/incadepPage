<?php if(!isset($nss)) die;
$nss->set('debug_mode',false);
$nss->set('show_admin_link',true);
$nss->set('cache_time','60');
$nss->set('cache_auto_refresh',true);
$nss->set('cache_auto_refresh_time','60');
$nss->set('date_default_timezone','');
$nss->set('cache_time_profile','86400');
$nss->set('date_time_format','%d %B %Y, %H:%M');
$nss->set('intro_fadein','700');
$nss->set('facebook_blacklist',"likes a post, on their own, likes their own, person who shared it may not have permission to share it with you, are now friends, likes a photo, is now friends with");
$nss->set('facebook_internal_limit','30');
$nss->set('twitter_consumer_key','');
$nss->set('twitter_consumer_secret','');
?>