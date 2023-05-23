<?php


namespace App\Controllers;
use App\Models\UserModel;


class Controller extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        return view('navigation/home');
    }

    public function loguear()        {
         // Obtiene los datos enviados desde el formulario
         $email = $this->request->getPost('email');
         $password = $this->request->getPost('password');
 
         // Realiza la validación de los datos de inicio de sesión
         $userModel = new UserModel();
         $user = $userModel->getUserByEmail($email);

         if ($email != null || password_verify((String)$password, (String)$user['Pass'])) {
             // Inicio de sesión exitoso, redirecciona al usuario a la página principal
             $this->session->set('nombre', $user['Nombre']);
             $this->session->set('apellidop', $user['ApellidoPaterno']);
             $this->session->set('apellidom', $user['ApellidoMaterno']);
             $this->session->set('email', $user['Email']);
             $this->session->set('curp', $user['Curp']);
             $this->session->set('rol', $user['Rol']);
             $this->session->set('municipio', $user['MunicipioOrigen']);
             $this->session->set('genero', $user['Genero']);
             $this->session->set('telefono', $user['Telefono']);
             switch($this->session->get('rol')){
                case 1:
                    return redirect()->to(base_url('mentoradoPage'));
                case 2:
                    return redirect()->to(base_url('mentorPage'));
                case 3:
                    return redirect()->to(base_url('adminPage'));
             }

         } else {
             // Credenciales inválidas, muestra un mensaje de error
             return redirect()->back()->with('error','credenciales invalidas');
         }
    }

    public function registrar(){
        $model = new UserModel();

        // Obtener los datos del formulario de registro
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('email'),
            'nombre' => $this->request->getPost('email')
        ];

        // Crear el usuario en la base de datos
        $model->createUser($data);
        return redirect()->to(base_url('login'));
    }
}