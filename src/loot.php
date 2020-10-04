<html lang="en">
<head>
    <title>MHCT Looter</title>
    <?php require "common_head.php"; ?>
    <script defer src="/scripts/loot.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/loot.css">
</head>
<body style="text-align: center;" class="text-center">
    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>MHCT Loot Search</h1>
        <a href="https://agiletravels.com" class="clickable"><span class="glyphicon glyphicon-chevron-left"></span> MHCT Tools</a>
    </div>
    <div class="container">
        <form id="search_options">
        <input id="prev_item" type="hidden" value="<?php (!empty($_GET['item']) ? print $_GET['item'] : '' ) ?>">
        <input id="prev_timefilter" type="hidden" value="<?php (!empty($_GET['timefilter']) ? print $_GET['timefilter'] : 'all' ) ?>">
        <div class="input-group col-sm-6 col-sm-offset-3">
            <div class="input-group" style="width:100%">
                <div class="input-group-addon"><strong>Loot:</strong></div>
                <input name="item" id="item" class="form-control input-lg" type="text" placeholder="Start typing loot name and select." autofocus>
            </div>

            <div class="input-group" style="width:100%">
                <div class="input-group-addon"><strong>Time:</strong></div>
                <select class="form-control input-lg" id="timefilter" name="timefilter">
                    <?php
                        $silent = true;
                        require_once "filters.php";
                        foreach ($filters as $filter) {
                            print '<option value="' . $filter['code_name'] . '">' . $filter['display_name'] . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div id="erase_item" class="input-group-addon fakebutton"><span class="glyphicon glyphicon-remove"></span></div>
        </div>
        <div class="input-group col-sm-6 col-sm-offset-3">
            <div class="input-group" style="width:100%">
                <div class="input-group-addon"><strong>Options:</strong></div>
                <div class="form-control">
                    <label>
                    <div class="switch">
                        <input type="checkbox" id="rate_per_hunt" value="1">
                        <span class="slider round"></span>
                    </div>
                    <span class="switch_label">Toggle per hunt rates</span>
                  </label>
                </div>
            </div>
        </div>
        </form>
        <br/>

        <div id="results" class="table-responsive"></div>

        <br/><p class="text-center">For more info, copy of the data, or if you want to help with data gathering, please look <a href="https://www.agiletravels.com">here</a>.</p>
    </div>
    <?php require "common_footer.php"; ?>
</body>
</html>
