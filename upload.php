<?php
// Параметры подключения к базе данных
$host = 'localhost'; // Адрес сервера 
$dbname = 'verdikhanov'; // Имя базы данных
$username = 'verdikhanov'; // Имя пользователя
$password = 'Fedya005'; // Пароль

try {
    // Подключение к базе данных с использованием PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Установка режима ошибки PDO на исключение
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL-запрос на вставку данных формы в таблицу
    $sql = "INSERT INTO applicant_forms (surname, name, patronymic, vacancy, education, assistant_certificate, rigger_certificate, gnvp, equipment_preparation, safety_measures, tubing_replacement, repair_necessity, pump_experience, leak_action, acid_treatment, cementing_materials, innovative_technologies, well_recovery_experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Подготовка SQL-запроса
    $stmt = $pdo->prepare($sql);

    // Привязка значений к параметрам SQL-запроса
    $stmt->execute([
        $_POST['surname'],
        $_POST['name'],
        $_POST['patronymic'],
        $_POST['vacancy'],
        $_POST['education'],
        $_POST['assistant_certificate'],
        $_POST['rigger_certificate'],
        $_POST['gnvp'],
        $_POST['equipment_preparation'],
        $_POST['safety_measures'],
        $_POST['tubing_replacement'],
        $_POST['repair_necessity'],
        $_POST['pump_experience'],
        $_POST['leak_action'],
        $_POST['acid_treatment'],
        $_POST['cementing_materials'],
        $_POST['innovative_technologies'],
        $_POST['well_recovery_experience']
    ]);

    // Вывод сообщения об успешной отправке
    echo "<h1>Спасибо за вашу заявку!</h1>";

} catch(PDOException $e) {
    // Вывод ошибки в случае неудачи
    die("Не удалось подключиться к базе данных: " . $e->getMessage());
}

?>
