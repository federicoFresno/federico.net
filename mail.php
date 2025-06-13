<?php
if (isset($_POST['type']) && !empty($_POST['type'])){
  $recipients = [
    "dylan@jolt.tech",
    "jimf@federico.net",
    "jimfed@gmail.com"
  ];

  $to = implode(',', $recipients);
  $subject = "Website Contact - Get Started Submission";
  $data = $_POST['data'];
  $name = $data['contact']['name'];
  $phone = $data['contact']['phone'];
  $email = $data['contact']['email'];
  $company = $data['contact']['company'];
  $msg = $data['contact']['message'];

  $td_style = "padding: 15px 5px; display: table-cell; text-align: left; vertical-align: middle;";
  $tr_style = "display: table-row; vertical-align: inherit; border-color: inherit; display: table-row; vertical-align: inherit; border-bottom: 1px solid #d0d0d0;";

  function make_li($arr)
  {
    $tmp_text = '';
    for ($a=0; $a<count($arr); $a++){
      $tmp_text .= '<li>';
      $tmp_text .= $arr[$a];
      $tmp_text .= "</li>";
    }
    return $tmp_text;
  }

  if($_POST['type'] == 'get_started'){
    $it = false;
    $it_services = [];

    $backup = false;
    $backup_services = [];

    $telecom = false;
    $telecom_services = [];

    //['services'][0] is IT
    for ($i=0; $i < count($data['services'][0]['options']); $i++){
      for ($j=0; $j<count($data['services'][0]['options'][$i]['options']); $j++){
        foreach($data['services'][0]['options'][$i]['options'][$j] as $key => $option){
          if ($key == 'title'){
            $tmp_title = $option;
          }
          if($key == 'value' && $option == 'true'){
            array_push($it_services, $tmp_title);
            $it = true;
          }
        }
      }
    }
    //['services'][1] is Backup
    for ($i=0; $i < count($data['services'][1]['options']); $i++){
      for ($j=0; $j<count($data['services'][1]['options'][$i]['options']); $j++){
        foreach($data['services'][1]['options'][$i]['options'][$j] as $key => $option){
          if ($key == 'title'){
            $tmp_title = $option;
          }
          if($key == 'value' && $option == 'true'){
            array_push($backup_services, $tmp_title);
            $backup = true;
          }
        }
      }
    }
    //['services'][2] is Telecom
    for ($i=0; $i < count($data['services'][2]['options']); $i++){
      for ($j=0; $j<count($data['services'][2]['options'][$i]['options']); $j++){
        foreach($data['services'][2]['options'][$i]['options'][$j] as $key => $option){
          if ($key == 'title'){
            $tmp_title = $option;
          }
          if($key == 'value' && $option == 'true'){
            array_push($telecom_services, $tmp_title);
            $telecom = true;
          }
        }
      }
    }

    $answer = array(
      "name"=>$name,
      "phone"=>$phone,
      "email"=>$email,
      "company"=>$company,
      "message"=>$msg,
      "it"=>$it_services,
      "backup"=>$backup_services,
      "telecom"=>$telecom_services,
    );

    $it_text = make_li($it_services);
    $backup_text = make_li($backup_services);
    $telecom_text = make_li($telecom_services);

    $message_body = "
      <table style='display: table; border-collapse: collapse; border-spacing: 0;'>
          <thead>
              <tr style='".$tr_style." background-color:#d0d0d0;'>
                  <th width='150' style='".$td_style."'>Field</th>
                  <th style='".$td_style."'>Answer</th>
              </tr>
          </thead>
          <tbody style='width:100%; display: table-row-group; vertical-align: middle; border-color: inherit;'>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Name</td>
                  <td style='".$td_style."'>".$name."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Phone</td>
                  <td style='".$td_style."'>".$phone."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Email</td>
                  <td style='".$td_style."'>".$email."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Company</td>
                  <td style='".$td_style."'>".$company."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Message</td>
                  <td style='".$td_style."'>".$msg."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>IT Services</td>
                  <td style='".$td_style."'><ul style='padding-left: 0px;'>".$it_text."</ul></td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Backup Services</td>
                  <td style='".$td_style."'><ul style='padding-left: 0px;'>".$backup_text."</ul></td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Telecom Services</td>
                  <td style='".$td_style."'><ul style='padding-left: 0px;'>".$telecom_text."</ul></td>
              </tr>
          </tbody>
      </table>
    ";
  }

  elseif ($_POST['type'] == 'contact') {
    $interests = [];
    for ($i=0; $i < count($data['contact']['interests']); $i++){
      if($data['contact']['interests'][$i]['value'] == 'true'){
        array_push($interests, $data['contact']['interests'][$i]['title']);
      }
    }

    $answer = array(
      "name"=>$name,
      "phone"=>$phone,
      "email"=>$email,
      "company"=>$company,
      "message"=>$msg,
      "interests"=>$interests,
    );

    $intersts_text = make_li($interests);

    $message_body = "
      <table style='display: table; border-collapse: collapse; border-spacing: 0;'>
          <thead>
              <tr style='".$tr_style." background-color:#d0d0d0;'>
                  <th width='150' style='".$td_style."'>Field</th>
                  <th style='".$td_style."'>Answer</th>
              </tr>
          </thead>
          <tbody style='display: table-row-group; vertical-align: middle; border-color: inherit;'>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Name</td>
                  <td style='".$td_style."'>".$name."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Phone</td>
                  <td style='".$td_style."'>".$phone."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Email</td>
                  <td style='".$td_style."'>".$email."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Company</td>
                  <td style='".$td_style."'>".$company."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Message</td>
                  <td style='".$td_style."'>".$msg."</td>
              </tr>
              <tr style='".$tr_style."'>
                  <td style='".$td_style."'>Services Requested</td>
                  <td style='".$td_style."'><ul style='padding-left: 0px;'>".$intersts_text."</ul></td>
              </tr>
          </tbody>
      </table>
    ";
  }
  else{
    die();
  }

  echo json_encode($answer);

  $message_head = file_get_contents('templates/partials/mail-head.php');
  $message_foot = file_get_contents('templates/partials/mail-foot.php');

  $message = $message_head . $message_body . $message_foot;

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <noreply@federico.net>' . "\r\n";

  mail($to,$subject,$message,$headers);
}
?>
