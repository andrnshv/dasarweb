<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi (AJAX)</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error"></span>
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error"></span>
        <br>

        <input type="submit" id="submit-btn" value="Submit">
    </form>

    <div id="server-message"></div>

    <script>
    $(document).ready(function () {
        $("#myForm").on("submit", function (event) {
            event.preventDefault();

            var nama = $.trim($("#nama").val());
            var email = $.trim($("#email").val());
            var valid = true;

            $("#nama-error").text("");
            $("#email-error").text("");
            $("#server-message").text("");

            if (nama === "") {
                $("#nama-error").text("Nama harus diisi.");
                valid = false;
            }

            if (email === "") {
                $("#email-error").text("Email harus diisi.");
                valid = false;
            } else {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    $("#email-error").text("Format email tidak valid.");
                    valid = false;
                }
            }

            if (!valid) return;

            $("#submit-btn").prop("disabled", true).val("Mengirim...");

            $.ajax({
                url: "proses_form.php",
                method: "POST",
                data: { nama: nama, email: email },
                success: function (response) {
                    $("#server-message").text(response);
                },
                error: function (xhr, status) {
                    $("#server-message").text("Terjadi kesalahan saat mengirim: " + status);
                },
                complete: function () {
                    $("#submit-btn").prop("disabled", false).val("Submit");
                }
            });
        });
    });
    </script>
</body>
</html>
