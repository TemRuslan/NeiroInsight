<?php
/**
 * Обработчик формы для сайта НейроИнсайт
 */

// 1. Указываем вашу почту, куда пойдет письмо
$to = "tem.ruslan97@gmail.com"; 

// 2. Получаем данные из формы
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$contact = isset($_POST['contact']) ? strip_tags(trim($_POST['contact'])) : '';

// 3. Проверяем, не пусты ли поля
if (empty($name) || empty($contact)) {
    http_response_code(400);
    echo "Пожалуйста, заполните все поля.";
    exit;
}

// 4. Формируем тему и текст письма
$subject = "Новая заявка: НейроИнсайт";
$message = "У вас новая заявка с сайта:\n\n";
$message .= "Имя: " . $name . "\n";
$message .= "Контакт (Тел/ТГ): " . $contact . "\n";
$message .= "Дата: " . date("d.m.Y H:i") . "\n";

// 5. Настраиваем заголовки (Headers)
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";
$headers .= "From: no-reply@yourdomain.com" . "\r\n"; // Желательно указать почту вашего домена

// 6. Отправка
if (mail($to, $subject, $message, $headers)) {
    http_response_code(200);
    echo "Сообщение успешно отправлено!";
} else {
    http_response_code(500);
    echo "Ошибка при отправке сообщения.";
}
?>