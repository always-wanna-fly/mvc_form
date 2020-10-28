<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";


class IndexController extends Controller {

    private $pageTpl = '/views/main.tpl.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();

    }

    public function index(){
        $this->pageData['title'] = 'Заповніть всі необхідні поля';
        $name = $_POST['form']['name'];
        $email = $_POST['form']['email'];
        $age = $_POST['form']['age'];
        $gender = $_POST['form']['gender'];
        $message = $_POST['form']['message'];
        $file = $_FILES['myfile'];
        $this->pageData['errors'] = [];
        $this->pageData['success']=FALSE;

        if (!IndexModel::checkName($name)) $this->pageData['errors']['error_name'] = "Ви не ввели ім'я, або заповнили поле некоректно";
        if (!IndexModel::checkEmail($email)) $this->pageData['errors']['error_email'] = "Не коректний email";
        if (!IndexModel::checkAge($age)) $this->pageData['errors']['error_age'] = "Лише цифри";
        if (!IndexModel::checkGender($gender)) $this->pageData['errors']['error_gender'] = "Оберіть гендер";
        if (!IndexModel::checkMessage($message)) $this->pageData['errors']['error_message'] = "Хоча б 20 символів";
        if (!IndexModel::checkFile($file)) $this->pageData['errors']['error_file'] = "Ви не додали фото";

        if (count($this->pageData['errors']) === 0){
            $this->model->sendMail($name, $email, $age, $gender, $message, $file);
            $this->pageData['success']=TRUE;
        }

        $this->view->render($this->pageTpl, $this->pageData);

    }


}