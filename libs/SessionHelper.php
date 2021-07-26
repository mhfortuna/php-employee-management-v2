<?PHP

class SessionHelper
{
     // function __construct()
     // {
     //      session_start();
     //      $this->checkExpiredSession();
     // }

     static function login()
     {
          session_start();
          $_SESSION["loginTime"] = time();
     }

     static function logout(bool $isAjaxRequest)
     {
          if (session_status() === PHP_SESSION_NONE) {
               session_start();
          }
          unset($_SESSION["loginTime"]);
          session_destroy();
          if ($isAjaxRequest) {
               http_response_code(403);
               exit();
          } else {
               header("Location: " . BASE_URL);
          }
     }
     static function checkExpiredSession(bool $isAjaxRequest)
     {
          session_start();
          if (isset($_SESSION["loginTime"])) {
               $sessionTime = time() - $_SESSION["loginTime"];
               if ($sessionTime > 600) {
                    SessionHelper::logout($isAjaxRequest);
               }
          } else {
               SessionHelper::logout($isAjaxRequest);
          }
     }
}




// require_once('loginManager.php');
// if(!isset($_SESSION)){
//      session_start();
// }
// if (isset($_GET["destroyUpdate"]) && $_GET["destroyUpdate"] == true){
//      unset($_SESSION["employeeUpdate"]);
//      unset($_SESSION['newEmployee']);
//      header("Location: ../employee.php");
// }

// function destroySessions(){
//      session_destroy();
//      header('Location: ../index.php?sessionExpired=true');
// }

// function checkExpiredSession(){

//      if(isset($_SESSION["timeout"])){
//           $sessionTimeForAlfonso = time() - $_SESSION["timeout"];
//           if($sessionTimeForAlfonso >120){
//                logOut();
//           }
//      }
// }

// function initSessionTime(){
//      $_SESSION["timeout"] = time();
//      header("Location: ../dashboard.php?login=success");
// }
