<?php


class Demo extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function render()
    {
        die();
    }


    function demo2()
    {

        $array = json_decode(file_get_contents("php://input"), true);
        $CEDULA = trim($array["cedula"]);
        $NUMERO = trim($array["numero"]);
        $TERMINOS = trim($array["terminos"]);
        $key = trim($array["key"]);
        $KEY = "7uXvhfOAUNbmfiKnzVlSq4uJRj0tx5G2";


        if (isset($array["cedula"]) && isset($array["numero"]) && isset($array["key"]) && isset($array["terminos"])) {
            if ($KEY == $key) {
                if ($CEDULA != null || $CEDULA != "" || $NUMERO != null || $NUMERO != "") {

                    $longitud = strlen($CEDULA);
                    $longitud_telefono = strlen($NUMERO);
                    if ($longitud == 9) {
                        $CEDULA = "0" . $CEDULA;
                    }
                    // Principal($CEDULA, $NUMERO, $TERMINOS);
                    $function = $this->model->Principal($CEDULA, $NUMERO, $TERMINOS);
                } else {
                    $res = array(
                        "SUCCESS" => "0",
                        "MENSAJE" => "CEDULA NO VALIDA"
                    );

                    echo json_encode($res);
                    exit();
                }
            } else {
                $res = array(
                    "SUCCESS" => "0",
                    "MENSAJE" => "LOS PARAMETROS NO SON VALIDOS"
                );
                echo json_encode($res);
                exit();
            }
        } else {
            $res = array(
                "SUCCESS" => "0",
                "MENSAJE" => "URL NO VALIDA, FALTAN PARAMETROS"
            );
            echo json_encode($res);
            exit();
        }
    }

    function demo()
    {

        if (isset($_GET["cedula"]) && isset($_GET["numero"]) && isset($_GET["key"]) && isset($_GET["terminos"])) {
            $CEDULA = trim($_GET["cedula"]);
            $NUMERO = trim($_GET["numero"]);
            $TERMINOS = trim($_GET["terminos"]);
            $key = trim($_GET["key"]);
            $KEY = "7uXvhfOAUNbmfiKnzVlSq4uJRj0tx5G2";

            // echo json_encode($NUMERO);

            if ($KEY == $key) {
                if ($CEDULA != null || $CEDULA != "" || $NUMERO != null || $NUMERO != "") {

                    $longitud = strlen($CEDULA);
                    $longitud_telefono = strlen($NUMERO);
                    if ($longitud == 9) {
                        $CEDULA = "0" . $CEDULA;
                    }
                    // Principal($CEDULA, $NUMERO, $TERMINOS);
                    $function = $this->model->Principal($CEDULA, $NUMERO, $TERMINOS);
                } else {
                    $res = array(
                        "SUCCESS" => "0",
                        "MENSAJE" => "CEDULA NO VALIDA"
                    );

                    echo json_encode($res);
                    exit();
                }
            } else {
                $res = array(
                    "SUCCESS" => "0",
                    "MENSAJE" => "LOS PARAMETROS NO SON VALIDOS"
                );
                echo json_encode($res);
                exit();
            }
        } else {
            $res = array(
                "SUCCESS" => "0",
                "MENSAJE" => "URL NO VALIDA, FALTAN PARAMETROS"
            );
            echo json_encode($res);
            exit();
        }
    }
}
