<?php
session_start();
$_SESSION['logged'] = false;
?>

<?php require_once 'includes/head.php'; ?>
<?php require_once 'includes/mainNavBar.php'; ?>

<div class="info__wrapper">
    <div class="info__img">
        <img src="./assets/icon-2.svg" alt="">
    </div>
    <div class="info__text">
        <h1 class="text__title">Bienvenido a tu Home Banking</h1>
        <p class="text__desc">Maneja tus cuentas desde la comodidad de tu hogar</p>
    </div>
</div>
<div class="form__wrapper">
    <div class="container__form still">
        <div class="form__arrow">
            <a id="l-arrow" href="#" class="fade-in"><img src="./assets/arrow.png" alt="arrow left"></a>
            <a id="r-arrow" href="#" class="fade-in"><img src="./assets/arrow.png" alt="arrow right" style="rotate:180deg;"></a>
        </div>
        <form class="form" action="procesoLogin.php" method="post" id="form-log">
            <div class="form__text">
                <h2 class="form__title">Ingresa a tu cuenta</h2>
            </div>
            <div class="form__username">
                <input maxlength="45" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
            </div>
            <div class="form__password">
                <input maxlength="45" type="password" name="clave" id="contraseña" placeholder="Contraseña" required>
            </div>
            <div class="form__captcha">
                <img src="./includes/imageGenerator.php" alt="" class="captcha__img">
                <input maxlength="45" type="text" class="captcha__input" id="captcha__input" name="captcha" required>
            </div>
            <button class="form__btn" type="submit">Ingresar</button>
        </form>
        <form class="form" action="procesoRegister.php" method="post" id="form-reg">
            <div class="form__text">
                <h2 class="form__title">Crea Tu cuenta</h2>
            </div>
            <div class="form__username">
                <input maxlength="45" type="text" name="usuario" id="reg-usuario" placeholder="Usuario">
            </div>
            <div class="form__username">
                <input maxlength="45" type="email" name="email" id="reg-email" placeholder="Email">
            </div>
            <div class="form__password">
                <input maxlength="45" type="password" name="clave" id="reg-contraseña" placeholder="Contraseña">
            </div>
            <div class="form__username">
                <input maxlength="45" type="text" name="nombre" id="reg-nombre" placeholder="Nombre">
                <input maxlength="45" type="text" name="apellido" id="reg-apellido" placeholder="Apellido">
            </div>
            <div class="form__username">
                <input maxlength="45" type="text" name="dni" id="reg-dni" placeholder="DNI">
            </div>

            <div class="form__captcha">
                <img src="./includes/imageGenerator.php" alt="" class="captcha__img">
                <input maxlength="5" type="text" class="captcha__input" id="captcha__input" name="captcha" required>
            </div>
            <button class="form__btn" type="submit">Registrarse</button>
        </form>

    </div>
</div>
<?php require_once 'includes/footer.php'; ?>