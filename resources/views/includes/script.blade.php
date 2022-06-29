<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function home(){
        $.ajax({
            url: "{{ route('/') }}",
            method: "GET",
            success:function (data) {
                $("body").html(data);
                read();
            }
        });
    }
    $("#submit").click(function () {
        let name = $("#name").val();
        let email = $("#email").val();
        let addressOne = $("#addressOne").val();
        let addressTwo = $("#addressTwo").val();
        let city = $("#city").val();
        let state = $("#state").val();
        let zip = $("#zip").val();
        $.ajax({
            type: "POST",
            url: "{{ route('store') }}",
            data:{name:name, email:email, addressOne:addressOne, addressTwo:addressTwo, city:city, state:state, zip:zip,  _token: '{{csrf_token()}}'},
            dataType: 'json',
            success: function(data){
                read();
                toastr.success(data);
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    $.each(err.responseJSON.errors, function (key, value) {
                        toastr.warning(value);
                    });
                }
            }
        });
    });
    function read(){
        let read="";
        $.ajax({
            url: "{{ url('manage-customer') }}",
            method: "GET",
            data: {read:read},
            dataType: 'json',
            success:function (res) {
                var tbody = '';
                $.each(res, function (key, value) {
                    tbody += '<tr>'
                    tbody += '<td>'+value.id+'</td>'
                    tbody += '<td>'+value.name+'</td>'
                    tbody += '<td>'+value.email+'</td>'
                    tbody += '<td>'+value.address_one+'</td>'
                    tbody += '<td>'+value.city+'</td>'
                    tbody += '<td>'+value.state+'</td>'
                    tbody += '<td>'+value.zip+'</td>'
                    tbody += '<td><button type="button" class="btn btn-primary btn-sm mr-2" onclick="Edit('+value.id+');">Edit</button><button type="button" class="btn btn-info btn-sm" onclick="Delete('+value.id+');">Delete</button></td>'
                    tbody += '</tr>'
                });
                $("#tbody").empty();
                $("#tbody").append(tbody);;
            },
        });
    }
    function Delete(id)
    {
        $con = confirm("are you sure delete this?");
        if ($con == true){
            $.ajax({
                url: "{{ route('customer-delete') }}",
                method: "POST",
                data: {id:id, _token: '{{csrf_token()}}'},
                success:function (data) {
                    toastr.warning(data);
                    read();
                }
            });
        }
    }
    function Edit(id)
    {
        $.ajax({
            url: "{{ route('edit') }}",
            method: "GET",
            data: {id:id},
            success:function (data) {
                console.log(data);
                $("body").html(data);
            }
        });
    }
    function update(id)
    {
        let name = $("#name").val();
        let email = $("#email").val();
        let addressOne = $("#addressOne").val();
        let addressTwo = $("#addressTwo").val();
        let city = $("#city").val();
        let state = $("#state").val();
        let zip = $("#zip").val();
        $.ajax({
            type: "POST",
            url: "{{ route('update') }}",
            data:{id:id, name:name, email:email, addressOne:addressOne, addressTwo:addressTwo, city:city, state:state, zip:zip,  _token: '{{csrf_token()}}'},
            dataType: 'json',
            success: function(data){
                read();
                toastr.success(data);
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    $.each(err.responseJSON.errors, function (key, value) {
                        toastr.warning(value);
                    });
                }
            }
        });
    }
</script>
