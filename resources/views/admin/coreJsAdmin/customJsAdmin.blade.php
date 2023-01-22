<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // select 2 plugin start here
    $('#multiple-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });


    // select 2 plugin end here


    // input field change functionality start here

    function changeDropDown(url, selecContainerId, method, appendContainer, anotherContainer,requireContainer) {
        const data = {
            'chapter_id': $('#' + selecContainerId).val()
        }
        $('#multiple-select-field').html('')


        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {

                $('.error').html('');
                

                if (response.status == 200) {
                    reuseOnChange(response.data,appendContainer,'name')
                }
                
                
                if (response.status == 300) {
                    $('#'+appendContainer).html('')
                    $('#'+anotherContainer).html('')
                    reuseOnChange(response.mentors,appendContainer,'name')
                    reuseOnChange(response.curriculum,anotherContainer,'module_name')

                }

                if(response.status=='curriculumItem'){
                    console.log(response.data);
                    $('#'+appendContainer).html('')
                    reuseOnChange(response.data,appendContainer,'item_name')
                }

                if(response.status=='assignments'){
                    $('#'+appendContainer).html('')
                    $('#'+anotherContainer).html('')
                    $('#'+requireContainer).html('')

                    reuseOnChange(response.students,appendContainer,'fname')
                    reuseOnChange(response.sessions,anotherContainer,'title')
                    reuseOnChange(response.mentors,requireContainer,'name')
                }




            }
        });



    }


    function reuseOnChange(response,container,diffColumn){
        $.each(response, function(index, element) {
            
            if(diffColumn=='name'){
                $('#' + container).append(`<option value="${element.id}">${element.name}</option>`)
            }
            if(diffColumn=='module_name'){
                $('#' + container).append( `<option value="${element.id}">${element.module_name}</option>`)

            }
            if(diffColumn=='item_name'){
                $('#' + container).append( `<option value="${element.id}">${element.item_name}</option>`)
                
            }
            if(diffColumn=='title'){
                $('#' + container).append( `<option value="${element.id}">${element.title}</option>`)
            
            }

            if(diffColumn=='fname'){
                $('#' + container).append( `<option value="${element.id}">${element.fname}</option>`)
            
            }
            

        });

    }






    // increment input field start here
    $(document).on('click', '#close-btn', function() {
        var html = '';
        var count = 0;
        html += '<tr>';
        html +=
            '<td colspan="2"><input class="form-control" type="text" name="topic[]" id="topic"><div class="error  error-topic text-danger"></td>';
        html +=
            ' <td colspan="2"><button class="btn btn-danger" style="margin:5px" id="removeBtn"><i  style="font-size: 20px;" class="btn-close btn-close-white glyphicon glyphicon-remove"> </i></button></td>';
        html += '</tr>';
        $('tbody').append(html);
        // $('tbody').append('');


        // $('.error-topic').html('')


    });

    $(document).on('click', '#removeBtn', function() {
        $(this).closest('tr').remove();
        // $('.error-topic').html('');

    });
    // close and add button scripts end here


    // increment input field end here



    //   submit form using serialization start here

    function postSerializeForm(url, method, formId) {
        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                $('.error').html('');

                if (response.status == 'success') {

                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })



                }
                if (response.status == 'error') {
                    Swal.fire({
                        position: 'top-end',
                        icon: response.status,
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500 
                    })

                }
                $('#' + formId)[0].reset();


            },
            error: function(response) {
                console.log(response.responseJSON.errors)

                $.each(response.responseJSON.errors, function(key, value) {
                    $('#error-' + key).text(value);
                    if (key == 'topic.0') {
                        $('.error-topic').html(value);

                    }



                });
            }
        });

    }


    // submit form using serialization end here
</script>
