<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impulsa tu Talento 2025</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #4CAF50;
            --dark-blue: #1e2a3a;
        }
        
        .navbar-brand img {
            height: 30px;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-green);
            border-bottom: 2px solid var(--primary-green);
            border-top: none;
            border-left: none;
            border-right: none;
            background-color: transparent;
        }
        
        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
        }
        
        .hero-section {
            background-color: var(--dark-blue);
            color: white;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .green-underline {
            border-bottom: 3px solid var(--primary-green);
            width: 40px;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        
        .btn-outline-light {
            border-color: #ffffff;
            color: #ffffff;
        }
        
        .category-pills .btn {
            border-radius: 20px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .category-pills .btn-success {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        
        .category-pills .btn-outline-secondary {
            color: #6c757d;
            border-color: #dee2e6;
        }
        
        .badge-destacado {
            background-color: var(--primary-green);
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 15px;
        }
        
        .card-info-icon {
            color: #6c757d;
            margin-right: 5px;
        }
        
        .search-bar {
            border-radius: 20px;
            border: 1px solid #dee2e6;
        }
        
        .search-bar input {
            border: none;
        }
        
        .search-bar input:focus {
            box-shadow: none;
        }
        .card:hover {
        transform: scale(1.1); /* Aumenta el tamaño un 10% */
        transition: transform 0.3s ease-in-out;
        z-index: 10; /* Asegura que esté sobre los demás */
        position: relative;
        }
    </style>
</head>
<body class="bg-white">
<?php include_once $content; ?>
 <!-- Bootstrap JS Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
