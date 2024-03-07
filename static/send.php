<?php 
// ОТПРАВКА В ТЕЛЕГРАММ
// ==================================================================================================================
   $site = 'GREEN LIVING';
   $name = $_POST['name'];
   $phone = $_POST['tel'];

   $square = $_POST['square'];
   $format = $_POST['format'];
   $region = $_POST['region'];
   $amount = $_POST['amount'];
   $name = $_POST['name'];
   $switching = $_POST['switching'];
   $planning = $_POST['planning'];
   $material = $_POST['material'];
   $roof = $_POST['roof'];
   
   //Отправка в Telegram
  
   $token = "6462770944:AAF2k3UBnGg8Kzs9PQEECuEL28_VUH15nos";
   
   $chat_id = "-1002042553946";
  
   // Формирование текста сообщения
  $message = "Заявка с сайта: $site\n";
  if ($name != '') {
    $message .= "Имя пользователя: $name\n";
  }
  if ($phone != '') {
    $message .= "Телефон пользователя: $phone\n";
  }
  if ($square != '') {
    $message .= "Желаемая площадь дома: $square\n";
  }
  if ($format != '') {
    $message .= "Формат дома: $format\n";
  }
  if ($region != '') {
    $message .= "Земельный участок: $region\n";
  }
  if ($amount != '') {
    $message .= "В какую сумму планируют уложиться: $amount\n";
  }
  if ($switching != '') {
    $message .= "Какие коммуникации планируют сделать сразу: $switching\n";
  }
  if ($material != '') {
    $message .= "Из какого материала хотят строить дом: $material\n";
  }
  if ($roof != '') {
    $message .= "Тип кровли: $roof\n";
  }
  if ($planning != '') {
    $message .= "Когда планируют приступить к строительству: $planning\n";
  }
  
  
  // Отправка запроса в Телеграм
  $url = "https://api.telegram.org/bot$token/sendMessage";
  $data = array(
      'chat_id' => $chat_id,
      'text' => $message
  );
  
  $options = array(
      'http' => array(
          'method' => 'POST',
          'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
          'content' => http_build_query($data)
      )
  );
  
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  
  if ($result === false) {
    // Обработка ошибки
    echo "Ошибка при отправке заявки в Телеграм.";
  } else {
    // Успешная отправка
    echo "Заявка успешно отправлена в Телеграм.";
  }

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

if ($sendToTelegram) {$result = "success";} 
else {$result = "error";}

?>