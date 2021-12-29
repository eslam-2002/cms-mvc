<?php


class Users extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register(){


        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        if ($_SERVER['REQUEST_METHOD']=='POST') {
      
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            if (empty($data['email'])) {
               $data['email_err'] = 'email cannot be empty';
            }else{
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = "email alredy taken";
                }
            }
            if (empty($data['name'])) {
                $data['name_err'] = 'name cannot be empty';
             }
             if (empty($data['password'])) {
                $data['password_err'] = 'password cannot be empty';
             }else if (strlen($data['password'])<8) {
                $data['password_err'] = 'password must be at least 8 characters';

             }
             if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'confirm password cannot be empty';
             }else if($data['password']!== $data['confirm_password']){
                $data['confirm_password_err'] = 'passworda don\'t match';

             }

             if (empty($data['email_err'])&&empty($data['name_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])) {
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            if($this->userModel->register($data)){
                flash('register_success', 'registered successfuly');
                redirect('users/login');
            }else die('something went wrong');
            }else{
                 $this->view('users/register',$data);
             }
        }else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('users/register',$data);

        }

    }
    public function login(){

            

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];
                if (empty($data['email'])) {
                   $data['email_err'] = 'email cannot be empty';
                }
          
                 if (empty($data['password'])) {
                    $data['password_err'] = 'password cannot be empty';
                 }
                 
                if ($this->userModel->findUserByEmail($data['email'])) {
                    
                }else{
                    $data['email_err']='no user found';
                }
                 if (empty($data['email_err'])&&empty($data['password_err'])) {
                     $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                     if ($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                     }else{
                         $data['password_err']='password incorrect';
                         $this->view('users/login',$data);

                     }
                 }else{
                     $this->view('users/login',$data);
                 }
            }
        else{
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login',$data);

        }

    }
    public function createUserSession($user)
    {
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        redirect('posts/index');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('pages/index');
    }
    

}