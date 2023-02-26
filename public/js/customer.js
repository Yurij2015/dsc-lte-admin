$(document).ready(function () {
    let table = '#table1';
    let modal = '#modal-ad-customer';
    let form = '#add-customer-form';
    $(form).on('submit', function (event) {
        event.preventDefault();
        let url = $(this).attr('action');
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                let row = '<tr>';
                row += '<td>#</td>';
                row += '<td>' + response.first_name + '</td>';
                row += '<td>' + response.email + '</td>';
                row += '<td>' + response.phone + '</td>';
                row += '<td>' + response.city + '</td>';
                row += '<td>' + response.country + '</td>';
                row += '<td>-</td>';
                row += '<td>' +
                    '<a href="customer-show/' + response.id + '">' +
                    '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">' +
                    '<i class="fa fa-lg fa-fw fa-eye"></i></button></a>' +
                    '<a href=\'customer-update/' + response.id + '\'>' +
                    '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">' +
                    '<i class="fa fa-lg fa-fw fa-pen"></i></button></a>' +
                    '<a href=\'customer-destroy?' + response.id + '\'>' +
                    '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">' +
                    '<i class="fa fa-lg fa-fw fa-trash"></i></button></a></td>';
                row += '</tr>';
                $(table).find('tbody').prepend(row);
                $(form).trigger("reset");
                $(modal+" .close").click()
            },
            error: function (response) {
            }
        });
    });
});
