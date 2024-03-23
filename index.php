<?php
// Проверяем, была ли форма отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обрабатываем отправленные данные
    // Здесь должен быть код для обработки и сохранения данных формы
    echo "<h1>Спасибо за вашу заявку!</h1>";
    // Выводим отправленные данные (пример)
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    exit; // Завершаем скрипт
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Анкета соискателя</title>
    <!-- Подключение Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background: linear-gradient(-45deg, #fffc00, #ff9a00, #303030, #fffc00, #ff9a00);
        background-size: 400% 400%;
        animation: gradientBG 30s ease infinite;
        color: #303030;
    }

    @keyframes gradientBG {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    form {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background: #ffffffdd; /* Slightly transparent white */
        border-radius: 10px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
    }

    h1, p {
        text-align: left;
        color: #333;
    }

    input[type="text"], select, textarea {
        width: calc(100% - 24px);
        padding: 12px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 2px solid #ff9a00; /* Border color */
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease-in-out;
        font-size: 16px;
        color: #303030;
    }

    input[type="text"]:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #ffa500;
        background-color: #fff;
        box-shadow: 0 0 0 2px #ffa50066;
    }

    button {
        width: 100%;
        background-image: linear-gradient(45deg, #ff9a00, #ff2e00);
        color: #fff;
        padding: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        transition: background-image 0.3s ease;
    }

    button:hover {
        background-image: linear-gradient(45deg, #e08900, #d02500);
    }

    .form-section {
        margin-bottom: 20px;
    }

    .form-section:not(:last-of-type) {
        border-bottom: 2px dashed #ff9a00;
        padding-bottom: 20px;
    }

    .form-icon {
        color: #ff9a00;
        margin-right: 8px;
    }

    .form-heading {
        margin-bottom: 20px;
        color: #ff9a00;
        font-size: 24px;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        form {
            margin: 20px;
        }
    }
</style>

    <script>
        function toggleVacancyFields() {
            var vacancy = document.getElementById("vacancy").value;
            var extraFields = document.getElementById("extraFields");
            if (vacancy == "Помощник бурильщика 5 разряда КРС") {
                extraFields.style.display = "block";
            } else {
                extraFields.style.display = "none";
            }
        }
    </script>
</head>
<body>

<form method="post" action="upload.php">
    <p>Фамилия: <input type="text" name="surname" required></p>
    <p>Имя: <input type="text" name="name" required></p>
    <p>Отчество: <input type="text" name="patronymic" required></p>
    
    <p>Выберите вакансию:
        <select name="vacancy" id="vacancy" onchange="toggleVacancyFields()" required>
            <option value="">Выберите вакансию</option>
            <option value="Помощник бурильщика 5 разряда КРС">Помощник бурильщика 5 разряда КРС</option>
            <!-- Добавьте другие вакансии здесь -->
        </select>
    </p>

    <div id="extraFields" style="display: none;">
    <p>Образование: <input type="text" name="education"></p>
    <p>Удостоверение помощника бурильщика 5 разряда: <select name="assistant_certificate">
        <option value="Да">Да</option>
        <option value="Нет">Нет</option>
        <option value="Просрочено">Просрочено</option>
    </select></p>
    <p>Удостоверение стропальщика 5 разряда: <select name="rigger_certificate">
        <option value="Да">Да</option>
        <option value="Нет">Нет</option>
        <option value="Просрочено">Просрочено</option>
    </select></p>
    <p>ГНВП: <select name="gnvp">
        <option value="Да">Да</option>
        <option value="Нет">Нет</option>
        <option value="Просрочено">Просрочено</option>
    </select></p>
    <!-- Добавляем дополнительные вопросы -->
    <p>Опишите процесс подготовки оборудования для капитального ремонта скважин: <textarea name="equipment_preparation"></textarea></p>
    <p>Какие меры безопасности следует соблюдать при спуске и подъеме оборудования в скважину? <textarea name="safety_measures"></textarea></p>
    <p>Объясните процесс замены насосно-компрессорных труб в скважине: <textarea name="tubing_replacement"></textarea></p>
    <p>Как вы определяете необходимость проведения капитального ремонта скважины? <textarea name="repair_necessity"></textarea></p>
    <p>Расскажите о вашем опыте работы с различными видами скважинных насосов: <textarea name="pump_experience"></textarea></p>
    <p>Как вы действуете в случае обнаружения утечки или другой аварийной ситуации? <textarea name="leak_action"></textarea></p>
    <p>В каких случаях применяется метод кислотной обработки скважины? <textarea name="acid_treatment"></textarea></p>
    <p>Опишите процесс выбора и подготовки материалов для цементирования скважин: <textarea name="cementing_materials"></textarea></p>
    <p>Какие инновационные технологии или методы в области капитального ремонта скважин вы использовали? <textarea name="innovative_technologies"></textarea></p>
    <p>Расскажите о вашем опыте восстановления и повышения производительности старых или заброшенных скважин: <textarea name="well_recovery_experience"></textarea></p>
</div>


    <button type="submit">Отправить</button>
</form>

</body>
</html>
