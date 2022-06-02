$(document).ready(function () {
    //khi người dùng nhấn vào nút xóa
    $('#btn_delete').click(function () {

        if (confirm("Are you sure you want to delete this?")) {
            var id = [];

            $(':checkbox:checked').each(function (i) {
                id[i] = $(this).val();
            });

            if (id.length === 0) //tell you if the array is empty
            {
                alert("Please Select at least one checkbox");
            }
            else {
                $.ajax({
                    url: 'QLTK/delete.php',
                    method: 'POST',
                    data: { id: id }, //id = cột box đầu tiên
                    success: function () {
                        for (var i = 0; i < id.length; i++) {
                            $('tr#' + id[i] + '').css('background-color', '#ccc');
                            $('tr#' + id[i] + '').fadeOut('slow');
                        }
                    }

                });
            }

        }
        else {
            return false;
        }
    });

    $('#add').click(function () {
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function () {
        var employee_id = $(this).attr("id"); //tra về id đầu tiên mà nó gặp
        $.ajax({
            url: "QLTK/fetch.php",
            method: "POST",
            data: { employee_id: employee_id },
            dataType: "json",
            success: function (data) {
                $('#first').val(data.firstname);
                $('#last').val(data.lastname);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#phanquyen').val(data.phanquyen);
                $('#birth').val(data.ngaysinh);
                $('#employee_id').val(data.id);
                $('#insert').val("Update");
                $('#add_data_Modal').modal('show');
            }
        });
    });
    $('#insert_form').on("submit", function (event) {
        event.preventDefault();
        if ($('#first').val() == "") {
            alert("Họ is required");
        }else if ($('#last').val() == "") {
            alert("Tên is required");
        }
        else if ($('#username').val() == '') {
            alert("Tên đăng nhập is required");
        }
        else if ($('#password').val() == '') {
            alert("Mật khẩu is required");
        }
        else if ($('#phanquyen').val() == '') {
            alert("vai trò is required");
        }else if ($('#birth').val() == '') {
            alert("Ngày sinh is required");
        }
        else {
            $.ajax({
                url: "QLTK/insert.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    $('#insert').val("Inserting");
                },
                success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        }
    });


    setTimeout(function () {
        $('#message').hide();
    }, 3000);

    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        }
        else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});
