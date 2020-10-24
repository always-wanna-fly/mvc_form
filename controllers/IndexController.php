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
        $errors = [];
        $this->pageData['success']=FALSE;

        if (!IndexModel::checkName($name)) $errors['name'] = "Ви не ввели ім'я, або заповнили поле некоректно";
        if (!IndexModel::checkEmail($email)) $errors['email'] = "Не коректний email";
        if (!IndexModel::checkAge($age)) $errors['age'] = "Лише цифри";
        if (!IndexModel::checkGender($gender)) $errors['gender'] = "Оберіть гендер";
        if (!IndexModel::checkMessage($message)) $errors['message'] = "Хоча б 20 символів";
        if (!IndexModel::checkFile($file)) $errors['file'] = "Ви не додали фото";

        $this->pageData['error_name']=$errors['name'];
        $this->pageData['error_email']=$errors['email'];
        $this->pageData['error_age']=$errors['age'];
        $this->pageData['error_gender']=$errors['gender'];
        $this->pageData['error_message']=$errors['message'];
        $this->pageData['error_file']=$errors['file'];
        if (count($errors) === 0){
            $this->model->sendMail($name, $email, $age, $gender, $message, $file);
            $this->pageData['success']=TRUE;
        }

        $this->view->render($this->pageTpl, $this->pageData);

    }


}