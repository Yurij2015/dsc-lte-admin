$(document).ready(function () {
    let table = '#table1';
    let modal = '#modal-ad-customer';
    let form = '#add-customer-form';
    $(form).on('submit', function (event) {
        event.preventDefault();
        let url = $(this).attr('action');
        const id = $(this).attr('data-id');
        const formData = $(form).serializeArray().reduce(function (a, x) {
            a[x.name] = x.value;
            return a;
        }, {});
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (!id) {
                    let row = '<tr>';
                    row += '<td>#</td>';
                    row += '<td>' + response.data.first_name + ' ' + response.data.last_name + '</td>';
                    row += '<td>' + response.data.email + '</td>';
                    row += '<td>' + response.data.phone + '</td>';
                    row += '<td>' + response.data.city + '</td>';
                    row += '<td>' + response.data.country + '</td>';
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
                } else {
                    if (id) {
                        $("#customer_" + id + " td:nth-child(2)").html(formData.first_name + ' ' + formData.last_name);
                        $("#customer_" + id + " td:nth-child(3)").html(formData.email);
                        $("#customer_" + id + " td:nth-child(4)").html(formData.phone);
                        $("#customer_" + id + " td:nth-child(5)").html(formData.city);
                        $("#customer_" + id + " td:nth-child(6)").html(formData.country);

                    }
                }
                $(form).trigger("reset");
                $(modal + " .close").click()
            },
            error: function (response) {
            }
        });
    });

    $('#add-customer').click(function () {
        $('#modal-ad-customer .modal-title').html('<i class="fas fa-user mr-2"></i> Create customer');
        $(form).trigger("reset");
        $("#add-customer-form").removeAttr('data-id');
    });

    $('.btn-edit').click(function () {
        const id = $(this).data('id');
        $('.close').attr('data-bs-dismiss', 'modal');
        $(form).removeAttr('action');
        $(form).attr('data-id', id);
        $(form).attr('action', 'customer-update/' + id);
        $.ajax({
            url: `customer-modal-show/${id}`,
            type: 'GET',
            success: function (response) {
                if (response && response.status === 'success') {
                    const data = response.data;
                    $('#modal-ad-customer .modal-title').html('<i class="fas fa-user mr-2"></i> Update customer');
                    $('#modal-ad-customer input[name=first_name]').val(data.first_name);
                    $('#modal-ad-customer input[name=last_name]').val(data.last_name);
                    $('#modal-ad-customer input[name=email]').val(data.email);
                    $('#modal-ad-customer input[name=address]').val(data.address);
                    $('#modal-ad-customer input[name=phone]').val(data.phone);
                    $('#modal-ad-customer input[name=city]').val(data.city);
                    $('#modal-ad-customer input[name=region]').val(data.region);
                    $('#modal-ad-customer select[name=country]').val(data.country);
                    $('#modal-ad-customer input[name=postal_code]').val(data.postal_code);
                    $('#modal-ad-customer').modal('toggle');
                }
            }
        })
    });
});
