<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <div class="grid">
    <?php
        include_once 'app/views/'.$this->page.'.php'; 
    ?>
    </div>
    <script src="/js/jquery-3.3.1.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>