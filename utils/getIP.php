<?php
function getUserIP()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    // IP dari shared internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // IP dari proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    // IP dari remote address (IP utama)
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
