<?php require 'layout/header.php'; ?>

<div class="glass">

    <div class="top-bar">

        <h1>Usuarios</h1>

        <a href="?action=create"
            class="btn">

            Crear Usuario

        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($users as $user): ?>

                <tr>

                    <td><?= $user['id'] ?></td>

                    <td><?= $user['name'] ?></td>

                    <td><?= $user['email'] ?></td>

                    <td><?= $user['role'] ?></td>

                    <td><?= $user['status'] ?></td>

                    <td>

                        <a class="btn-edit"
                            href="?action=edit&id=<?= $user['id'] ?>">

                            Editar

                        </a>

                        <a class="btn-delete"
                            onclick="return confirmDelete()"
                            href="?action=delete&id=<?= $user['id'] ?>">

                            Eliminar

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php require 'layout/footer.php'; ?>