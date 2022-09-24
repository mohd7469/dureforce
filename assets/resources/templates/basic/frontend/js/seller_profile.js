
'use strict';

$(document).ready(function() {
    readmore();

});
function readmore() {

    $( "#clickme" ).click(function() {
        $( "#book" ).slideToggle( "slow", function() {
            // Animation complete.
        });
    });
}







    // var path = "/skills";
    //
    // $('#skills').typeahead({
    //     name: 'skills',
    //     limit: 10,
    //     source: function(query, process){
    //
    //         return $.get(path, {query:query}, function(data){
    //             return process(data);
    //
    //         });
    //
    //     },
    //
    //
    // });




