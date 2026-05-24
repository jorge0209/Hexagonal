<?php require 'layout/header.php'; ?>

<div class="glass form-container">

    <h1>Crear Usuario</h1>

    <?php if (isset($error)): ?>

        <div class="error">

            <?= $error ?>

        </div>

    <?php endif; ?>

    <form method="POST">

        <input type="text"
               name="name"
               placeholder="Nombre"
               required>

        <input type="email"
               name="email"
               placeholder="Correo"
               required>

        <input type="password"
               name="password"
               placeholder="Contraseña"
               required>

        <select name="role">

            <option value="USER">USER</option>

            <option value="ADMIN">ADMIN</option>

        </select>

        <select name="status">

            <option value="ACTIVE">ACTIVE</option>

            <option value="INACTIVE">INACTIVE</option>

        </select>

        <button class="btn">

            Guardar Usuario

        </button>

    </form>

</div>

<?php require 'layout/footer.php'; ?>