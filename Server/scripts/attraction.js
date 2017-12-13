$( function() {
    $("#erase_mouse").click(function () {
        $("#results").html('');
        $("#mouse").val('').focus();
        window.history.replaceState({}, "MH Hunt Helper", "");
    });

    searchMice('all', firstLoad);

    function searchMice(mouse_id, callback) {
        if (mouse_id !== 'all') {
            $("#loader").css( "display", "block" );
            // Every time we search for a mouse (on reload or ajax) set a history of it.
            window.history.replaceState({}, "MH Hunt Helper", "?mouse=" + mouse_id);
        }

        $.ajax({
            url: "searchByItem.php",
            method: "POST",
            data: {
                item_id: mouse_id,
                item_type: "mouse"
            }
        })
        .done(function( data ) {
            callback( JSON.parse(data));
        });
    }

    function firstLoad(mice) {
        // Check and search for previous mouse (done on reload of whole page)
        var previous_mouse_id = $("#prev_mouse").val();
        if (previous_mouse_id) {
            var previous_mouse_name = '';
            for (var i = 0; i < mice.length; i++) {
                if (mice[i].id == previous_mouse_id) {
                    previous_mouse_name = mice[i].value;
                    $("#mouse").val(previous_mouse_name);
                    break;
                }
            }
            searchMice($("#prev_mouse").val(), renderResultsTable);
        }

        // set autocomplete
        addAutocomplete(mice);
    }

    function addAutocomplete(mice) {
        $('#mouse').autocomplete({
            source: function(request, response) {
                var results = $.ui.autocomplete.filter(mice, request.term);
                response(results.slice(0, 10));
            },
            delay: 0,
            select: function( event, ui ) {
                searchMice(ui.item.id, renderResultsTable);
            }
        });

        // Fix for double click on IOS
        if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
            $('#mouse').autocomplete('widget').off('mouseenter');
        }
    }

    function renderResultsTable(data) {
        var final_html = '<table id="results_table" class="table table-striped table-hover"><thead><tr><th>Location</th><th>Stage</th><th>Cheese</th><th>Rate</th><th>Total hunts</th></tr></thead><tbody>';

        var all_stages = '';
        data.forEach(function(row) {
            var stage = (row.stage ? row.stage : '');
            all_stages += stage;
            final_html += '<tr><td>'
                + row.location + '</td><td>'
                + stage + '</td><td>'
                + row.cheese + '</td><td>'
                + parseFloat(((row.rate)/100).toFixed(2)) + '%</td><td>'
                + row.total_hunts + '</td></tr>';
        });
        final_html += '</tbody></table>';
        $("#results").html(final_html);
        $('#results_table').DataTable( {
            "paging":   false,
            "searching": false,
            "info": false,
            "order": [[4, 'desc']],
            "columnDefs": [
                {
                    "targets": [ 1 ],
                    "visible": (all_stages.length === 0 ? false : true)
                }
            ]
        });
        var table = $('#results_table').DataTable();
        table.columns().iterator( 'column', function (ctx, idx) {
            $( table.column(idx).header() ).append('<span class="sort-icon"/>');
        });

        $("#loader").css( "display", "none" );
    }
});
