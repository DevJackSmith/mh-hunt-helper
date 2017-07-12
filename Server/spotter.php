<!DOCTYPE html>
<html>
<head>
    <title>Jack's MH Map Spotter</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/attraction.css">
</head>

<body class="text-center" style="background-color: #fff;">
<script src="scripts/spotter.js"></script>

<!-- Jumbotron -->
<div class="jumbotron">
    <div class="container-fluid">
        <h1>Jack's MH Map Spotter</h1>
        <p>Tool for map sniping.</p>
        <a href="https://agiletravels.com" class="clickable"><span class="glyphicon glyphicon-chevron-left"></span> Jack's MH Tools</a>
    </div>
</div>

<div class="container">
    <a href="spotterManager.php" class="pull-right"><button class="btn btn-success">Create/Manage Snipe Requests</button></a><br/><br/>

    <p>All requests automatically removed 72 hours after posting.</p>
    <div id="currentRequests"></div>
</div><br/><br/>

<?php //include_once("ga.php") ?>
</body>
</html>