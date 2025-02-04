<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form id="form-sampel" action="{{url('sampel-socket-submit')}}" method="post">
        @csrf
        <input type="text" id="name" name="name">
        <button onclick="submitMe()" type="button">Submit</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody class="list-sample">
        </tbody>
    </table>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var intNumb = 1
    function submitMe()
    {
        var formId = "form-sampel"
        var formData = new FormData($("#" + formId)[0]);
        var url = $("#" + formId).attr("action")

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                const jsonData = JSON.parse(response)

                $('.list-sample').append("<tr><td>"+intNumb+"</td><td>"+jsonData.data.name+"</td></tr>")
                intNumb++
                
            },
            error: function (xhr, status, error) {

            },
        });
    }
</script>
</html>