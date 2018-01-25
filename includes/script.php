<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<script src="../js/jquery.simplemodal.js"></script>
<script src="../js/js.js"></script>
<script>

function login(){ 

	var email=document.getElementById("email").value;

	var password_login=document.getElementById("password_login").value;



		$.ajax({

			type: "POST",

			url: "./acciones/login.php",

			data: { email: email, password_login: password_login }, 

			success:function(data) {

				result= data; 

			}

		}).done(function login() {

			var opcion = result.trim();

				if(opcion == 0){

			alert("Bienvenido,nos alegramos de volver a verte");

			location.href="index.php";

		}else{

			alert('Opps parece que no es un usuario registrado');	

		}

		

		});

	}

</script>
<script type="text/javascript">
function mostrar(){
document.getElementById('oculto').style.display = 'block';}

</script>