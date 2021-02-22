<?php
function cleanCertificatePrint($data) {

  foreach ($data as $key => $value) {

    $data[$key]['os'] = formatTimePrint($value['os']);
    $data[$key]['aop'] = formatTimePrint($value['aop']);
  }

  return $data;
}

function formatTimePrint($data) {
  if($data == '0000-00-00' || $data == '' || $data == null) {
    $data = '';
  } else {
    $data = date("d-m-Y", strtotime($data));
  }
  return $data;
}

function formatTimeDatabase($data) {
  if($data == '0000-00-00' || $data == '' || $data == null) {
    $data = '';
  } else {
    $data = date("Y-m-d", strtotime($data));
  }
  return $data;
}
