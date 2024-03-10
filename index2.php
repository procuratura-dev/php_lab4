<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваши данные</title>
</head>
<body>

<?php
// Обработка данных при отправке формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $inputNameValue = isset($_POST['inputName']) ? $_POST['inputName'] : '';
    $inputNumberValue = isset($_POST['inputNumber']) ? $_POST['inputNumber'] : '';
    $selectValue = isset($_POST['selectOption']) ? $_POST['selectOption'] : '';

    // Вывод данных на экран
    echo "<h2>Ваши данные:</h2>";
    echo "<p>Ваше имя: $inputNameValue</p>";
    echo "<p>Ваш возраст: $inputNumberValue</p>";
    echo "<p>Вы являетесь: $selectValue</p>";
}
?>

<!-- Форма -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="inputName">Ваше имя:</label>
    <input type="name" id="inputName" name="inputName" required>
    <br>
    <label for="inputNumber">Ваш возраст:</label>
    <input type="number" id="inputNumber" name="inputNumber" required>
    <br>
    <label for="selectOption">Выберите кто вы:</label>
    <select id="selectOption" name="selectOption" required>
        <option value="Школьником">Школьник</option>
        <option value="Студентом">Студент</option>
        <option value="Докторатом">Докторат</option>
    </select>
    <br>
    <button type="submit">Отправить</button>
</form>

</body>
</html>
