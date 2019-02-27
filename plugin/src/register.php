<?php
namespace miniorange\sso;

use miniorange\sso\connector;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Register extends Controller
{

    public function index()
    {
        echo "enter method";
        if (! isset($_SESSION)) {
            session_id("connector");
            session_start();
        }
        $data_folder = __DIR__ . '\helper\data';
        if (! file_exists($data_folder))
            mkdir($data_folder);
        if (isset($_POST['option']) && ! empty($_POST['option'])) {

            $email = '';
            $password = '';
            if (isset($_POST['email']) && ! empty($_POST['email']))
                $email = $_POST['email'];
            if (isset($_POST['password']) && ! empty($_POST['password']))
                $password = $_POST['password'];
            if (! empty($password)) {
                $password = sha1($password);
            }
            if ($_POST['option'] === 'register') {
                $user_credential = array(
                    $email => $password
                );
                $file = dirname(__FILE__) . '\helper\data\credentials.json';
                $json_string = json_encode($user_credential, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                file_put_contents($file, $json_string);
                $_SESSION['authorized'] = true;
                $_SESSION['admin_email'] = $email;
                if ((new Connector())->mo_saml_is_customer_license_verified()) {
                    header("Location: setup.php");
                    exit();
                } else {
                    header("Location: account");
                    exit();
                }
            }
        }

        if (is_user_registered()) {
            header('Location: admin_login.php');
            exit();
        }
    }
}
?>
