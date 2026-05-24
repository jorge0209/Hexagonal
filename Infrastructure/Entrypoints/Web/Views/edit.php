<?php require 'layout/header.php'; ?>

<div class="glass form-container">

    <h1>Editar Usuario</h1>

    <form method="POST">

        <input type="text"
               name="name"
               value="<?= $user['name'] ?>"
               required>

        <input type="email"
               name="email"
               value="<?= $user['email'] ?>"
               required>

        <select name="role">

            <option value="USER"
                <?= $user['role'] === 'USER'
                    ? 'selected'
                    : '' ?>>

                USER

            </option>

            <option value="ADMIN"
                <?= $user['role'] === 'ADMIN'
                    ? 'selected'
                    : '' ?>>

                ADMIN

            </option>

        </select>

        <select name="status">

            <option value="ACTIVE"
                <?= $user['status'] === 'ACTIVE'
                    ? 'selected'
                    : '' ?>>

                ACTIVE

            </option>

            <option value="INACTIVE"
                <?= $user['status'] === 'INACTIVE'
                    ? 'selected'
                    : '' ?>>

                INACTIVE

            </option>

        </select>

        <button class="btn">

            Actualizar Usuario

        </button>

    </form>

</div>

<?php require 'layout/footer.php'; ?>