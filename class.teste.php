class Teste{
	public function insta($email){
require_once 'usuario.php';
$this->email = $email;
$sql = "SELECT email FROM usuarios WHERE email LIKE '%{$email}%'";
$stmt = banco::getConecta()->prepare($sql);
$stmt->execute();
$qtd = $stmt->rowCount();
    if($qtd):
       echo "
            <script>
            $('.rbutton').ready(function() {
              $('#confirma').prop('disabled', true);
            });
            </script>
            <span style='color: red;'>Este email já esta sendo utilizado ou está em formato incorreto!</span>";

    else: 
      echo" 
         <script>
         $('.rbutton').ready(function() {
            $('#confirma').prop('disabled', false);
         });
         </script>";
   endif; 
   }
}