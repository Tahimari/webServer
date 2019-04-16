/* 
 * eConnect4u
 */

$(document).ready(function() {
    $('.js-user-autocomplete').each(function() {
        var autocompleteUrl = '/items/api/get';
        $(this).autocomplete({hint: false}, [
            {
                source: function(query, cb) {
                    $.ajax({
                        url: autocompleteUrl+'?query='+query
                    }).then(function(data) {
                        console.log(data);
                        cb(data);
                    });
                },
                displayKey: 'title',
                debounce: 500 // only request every 1/2 second
            }
        ])
    });
});