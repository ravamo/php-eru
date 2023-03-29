
function showLoadingImg (elementSelector) {
    console.log('showing ' + elementSelector);
    var element = $(elementSelector);
    element.show();
}

function hideLoadingImg (elementSelector) {
    console.log('hiding ' + elementSelector);
    var element = $(elementSelector);
    element.hide();
}

/**
 * Base Get AJAX function
 * @param  {string} url   Controller to ivoke
 * @param  {string} start Start date to gather stats
 * @param  {string} end   End date to gather stats
 * @return {[type]}       Ajax object
 */
function xhr_get(url, dataType, data, elementSelector) {
    return $.ajax({
        url: url,
        type: 'get',
        dataType: dataType,
        beforeSend: showLoadingImg(elementSelector),
        data: data
    })
        .fail(function() {
            hideLoadingImg(elementSelector);
        });
}