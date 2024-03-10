<div class="form">
 <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
 <fieldset>
 <legend>Оставьте отзыв!</legend>
 <div id="main_info" style="display: flex; flex-direction: 
column; gap: 10px;">
 <div>
 <label for="name">Имя:
 <input type="text" name="name"/>
 </label>
 </div>
 <div>
 <label for="email">Email:
 <input type="email" name="email"/>
 </label>
 </div>
 </div>
 <div id="extra_info">
 <div>
 <p><label for="review">Оцените наш сервис!</label></p>
 <div style="display: flex; flex-direction: column;">
 <p><input id="review" type="radio" name="review" 
value="10" checked>Хорошо</p>
 <p><input id="review" type="radio" name="review" 
value="8">Удовлетворительно</p>
 <p><input id="review" type="radio" name="review" 
value="5">Плохо</p>
 </div>
 </div>
 </div>
 <div id="message_info">
 <div>
 <p><label for="comment">Ваш комментарий: </label></p>
 <textarea id="comment" name="comment" cols="30" 
rows="10" class="comment"></textarea>
 </div>
 </div>
 <div id="buttons" style="display: flex; flex-direction: row; 
gap: 10px; margin-top: 10px;">
 <input type="submit" value="Отправить"/>
 <input type="reset" value="Удалить"/>
 </div>
 </fieldset>
 </form>
 <!-- Добавьте в эту область код, который будет отображать сообщение
только после отправки формы -->

<!-- <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<div id="result">';
        echo '<p>Ваше имя: <b>' . htmlspecialchars($_POST["name"]) . '</b></p>';
        echo '<p>Ваш e-mail: <b>' . htmlspecialchars($_POST["email"]) . '</b></p>';
        echo '<p>Оценка товара: <b>' . htmlspecialchars($_POST["review"]) . '</b></p>';
        echo '<p>Ваше сообщение: <b>' . htmlspecialchars($_POST["comment"]) . '</b></p>';
        echo '</div>';
    }
    ?> -->


<?php
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $review = $_POST["review"];
    $comment = $_POST["comment"];

    $errors = [];

    if (empty($name) || empty($email) || empty($review) || empty($comment)) {
        $errors[] = "Пожалуйста заполните все поля.";
    }

    if (!validateEmail($email)) {
        $errors[] = "Неправильный формат почты.";
    }

    if (!empty($errors)) {
        echo '<div id="error">';
        foreach ($errors as $error) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
        echo '</div>';
    } else {
        echo '<div id="result">';
        echo '<p>Ваше имя: <b>' . htmlspecialchars($name) . '</b></p>';
        echo '<p>Ваш e-mail: <b>' . htmlspecialchars($email) . '</b></p>';
        echo '<p>Оценка товара: <b>' . htmlspecialchars($review) . '</b></p>';
        echo '<p>Ваше сообщение: <b>' . htmlspecialchars($comment) . '</b></p>';
        echo '</div>';
    }
}
?>

</div>