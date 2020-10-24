<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">

    <h2><?php echo $pageData['title']?></h2>


    <div class="form__wrapper">
        <h2><?php if($pageData['success']){
                echo 'Данні відправленно';
            } ?></h2>
        <p><span class="error">Обов'язкові поля</span></p>
        <form id="feedback-form" method="post" enctype="multipart/form-data" novalidate action="">
            <div class="form-row">
                <!-- Имя пользователя -->
                <div class="form-group">
                    <label for="name" class="control-label">Ваше ім'я</label>
                    <input id="name" type="text" name="form[name]" class="form-control" value="<?php echo !empty($_POST['form']['name']) ? $_POST['form']['name'] : FALSE;?>" placeholder="Ім'я" minlength="2"
                           maxlength="30" required="required">
                    <i class="info">Лише символи латиниці и кирилиці</i>
                    <span class="error">* <?php echo !empty($pageData['error_name']) ? $pageData['error_name'] : FALSE;?></span>
                    <div class="invalid-feedback"></div>
                </div>

                <!--                 Email пользователя-->
                <div class="form-group">
                    <label for="email" class="control-label">Email-адреса</label>
                    <input id="email" type="email" name="form[email]" required="required" class="form-control" value="<?php echo !empty($_POST['form']['email']) ? $_POST['form']['email'] : FALSE;?>"
                           placeholder="Email-адреса">
                    <span class="error">* <?php echo !empty($pageData['error_email']) ? $pageData['error_email'] : FALSE;?></span>
                    <div class="invalid-feedback"></div>
                </div>

                <!--                 Пол пользователя-->
                <div class="form-group">
                    <label for="gender" class="control-label">Ваша стать</label>
                    <input type="radio" id="male" name="form[gender]" value="male">
                    <label for="male">Чоловік</label>
                    <input type="radio" id="female" name="form[gender]" value="female">
                    <label for="female">Жінка</label><br>
                    <span class="error">* <?php echo !empty($pageData['error_gender']) ? $pageData['error_gender'] : FALSE;?></span>
                </div>

                <!-- Возраст пользователя -->
                <div class="form-group">
                    <label for="age" class="control-label">Ваш вік</label>
                    <input id="age" type="email" name="form[age]" required="required" class="form-control" value="<?php echo !empty($_POST['form']['age']) ? $_POST['form']['age'] : FALSE;?>"
                           placeholder="Ваш вік">
                    <div class="invalid-feedback"></div>
                    <i class="info">Лише цифри</i>
                    <span class="error">* <?php echo !empty($pageData['error_age']) ? $pageData['error_age'] : FALSE;?></span>
                </div>


                <!-- Сообщение пользователя -->
                <div class="form-group">
                    <label for="message" class="control-label">Повідомлення</label>
                    <textarea  id="message" name="form[message]" class="form-control" rows="3"
                              placeholder="(не меньше 20-ти символів)" minlength="20" maxlength="500"
                              required="required"></textarea>
                    <span class="error">* <?php echo !empty($pageData['error_message']) ? $pageData['error_message'] : FALSE;?></span>
                </div>




                <!--                 Файлы, для прикрепления к форме-->
                <div class="form-group form-attachments" data-count="5">
                    <div class="form-attachments__wrapper">
                        <input type="file" name="myfile[]" multiple id="myfile">
                        <div class="form-attachments__items">
                            <div class="form-attachments__description">
                                <div>Нажміть щоб додати файли.</div>
                                <div>Можна додати jpg, jpeg, bmp, gif, png.</div>
                            </div>
                        </div>
                    </div>
                    <span class="error">* <?php echo !empty($pageData['error_file']) ? $pageData['error_file'] : FALSE;?></span>
                </div>


            </div>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

</div>

</body>
</html>

