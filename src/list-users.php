<?php
    include('config/database.php');
    $query = "SELECT firstname, lastname, email, status FROM users";
    $result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .header-custom {
            background-color: #343a40;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header-custom mb-4 text-center">
            <h1 class="mb-0">Usuarios Registrados</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-custom">
                <thead class="table-dark">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = pg_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                                <?php if ($row['status']): ?>
                                    <span class="badge bg-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactivo</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
