$(document).ready(function () {

    $(".user-item").hover(function () {
        $(this).css('background-color', "red")
    }, function () {
        $(this).css('background-color', "white")
    })

    $('.delete-user').click(function () {
        if (confirm('Are you sure')) {
            let idUser = $(this).attr('data-id');
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/users/' + idUser + '/delete',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    $('#user-' + idUser).remove();
                },
                error: function (error) {

                }

            })
        }
    })


    $('#search-user').keyup(function () {
        let value = $(this).val();
        if (value) {
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/users/search',
                method: 'GET',
                data: {
                    keyword: value
                },
                dataType: 'json',
                success: function (res) {
                    let html = '';
                    res.forEach(function (item, index) {
                        html += '<button class="list-group-item list-group-item-action">';
                        html += item.name;
                        html += '</button>'
                    })
                    $('#list-user-search').html(html);
                },
                error: function (error) {

                }

            })
        } else  {
            $('#list-user-search').html('');

        }

    })
})
