<?php
// Создаем массив с вопросами и ответами
$questions = array(
  array(
    "question" => "Как называется главный файл скрипта на php?",
    "type" => "radio", // тип ввода - радиокнопка
    "options" => array("index.php", "main.php", "script.php", "run.php"), // варианты ответов
    "answer" => "index.php" // правильный ответ
  ),
  array(
    "question" => "Какие из этих функций используются для работы с массивами?",
    "type" => "checkbox", // тип ввода - чекбокс
    "options" => array("array_push", "array_pop", "array_merge", "array_split"), // варианты ответов
    "answer" => array("array_push", "array_pop", "array_merge") // правильные ответы
  ),
  array(
    "question" => "Какой символ используется для конкатенации строк в php?",
    "type" => "radio", // тип ввода - радиокнопка
    "options" => array("+", ".", "*", "/"), // варианты ответов
    "answer" => "." // правильный ответ
  )
);

// Проверяем, была ли отправлена форма
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  if (empty($name)) {
    // Выводим сообщение об ошибке
    echo "Пожалуйста, введите свое имя.";
  } else {
    // Создаем переменную для подсчета правильных ответов
    $score = 0;
    foreach ($questions as $index => $question) {
      $type = $question['type'];
      $options = $question['options'];
      $answer = $question['answer'];
      // Получаем ответ пользователя из формы
      $user_answer = $_POST['answer' . $index];
      if (empty($user_answer)) {
        // Выводим сообщение об ошибке
        echo "Пожалуйста, выберите ответ на вопрос №" . ($index + 1) . ".<br>";
      } else {
        // Сравниваем ответ пользователя с правильным ответом
        if ($type == "radio") {
          if ($user_answer == $answer) {
            $score++;
          }
        } elseif ($type == "checkbox") {
          if (count($user_answer) == count($answer)) {
            $correct = true;
            foreach ($user_answer as $option) {
              if (!in_array($option, $answer)) {
                $correct = false;
                break;
              }
            }
            if ($correct) {
              $score++;
            }
          }
        }
      }
    }
    // Выводим результаты на экран
    echo "Привет, $name!<br>";
    echo "Твой результат: $score из " . count($questions) . ".<br>";
    foreach ($questions as $index => $question) {
      // Выводим вопрос и ответ пользователя
      echo ($index + 1) . ". " . $question['question'] . "<br>";
      echo "Твой ответ: ";
      // Выводим ответ в зависимости от типа ввода
      if ($question['type'] == "radio") {
        echo $_POST['answer' . $index] . "<br>";
      } elseif ($question['type'] == "checkbox") {
        echo "(" . implode(", ", $_POST['answer' . $index]) . ")<br>";
      }
      echo "Правильный ответ: ";
      if ($question['type'] == "radio") {
        echo $question['answer'] . "<br>";
      } elseif ($question['type'] == "checkbox") {
        echo "(" . implode(", ", $question['answer']) . ")<br>";
      }
      echo "<br>";
    }
  }
} else {
  // Если форма не отправлена, то выводим форму
  echo '<form method="post" action="">';
  echo 'Введите свое имя: <input type="text" name="name"><br><br>';
  foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "<br>";
    if ($question['type'] == "radio") {
      foreach ($question['options'] as $option) {
        echo '<input type="radio" name="answer' . $index . '" value="' . $option . '">' . $option . '<br>';
      }
    } elseif ($question['type'] == "checkbox") {
      foreach ($question['options'] as $option) {
        echo '<input type="checkbox" name="answer' . $index . '[]" value="' . $option . '">' . $option . '<br>';
      }
    }
    echo "<br>";
  }
  echo '<input type="submit" name="submit" value="Отправить">';
  echo '</form>';
}
?>
