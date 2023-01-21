<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// select 2 plugin start here
    $( '#multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );


// select 2 plugin end here


// input field change functionality start here
$(document).on('change','#chapter_id_select', function() {
    
    const data = {
        'chapter_id':$('#chapter_id_select').val()
    }

              
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#multiple-select-field').html('')

                $.ajax({
                    type: "POST",
                    url: "{{ route('curriculum.store') }}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        $('.error').html('');
                       $.each(response.data, function (index, element) {

                        $('#multiple-select-field').append( ` <option value="${element.id}">${element.name}</option>`);
                        
                      
                            
                         
                       });
                        
                       
                        
                    }
                });
                // ajax csrf token end
              

            });

            // input field functionality end here





            // increment input field start here
            $(document).on('click','#close-btn', function () {
            var html = '';
            var count=0;
            html +='<tr>';
            html +='<td colspan="2"><input class="form-control" type="text" name="topic[]" id="topic"><div class="error  error-topic text-danger"></td>';
            html +=' <td colspan="2"><button class="btn btn-danger" style="margin:5px" id="removeBtn"><i  style="font-size: 20px;" class="btn-close btn-close-white glyphicon glyphicon-remove"> </i></button></td>';
            html += '</tr>';
            $('tbody').append(html);
            // $('tbody').append('');
                              
            
            // $('.error-topic').html('')
            
            
        });

        $(document).on('click', '#removeBtn', function () {
            $(this).closest('tr').remove();
            // $('.error-topic').html('');
            
        });
        // close and add button scripts end here


  // increment input field end here



//   submit form using serialization start here

function postSerializeForm(url,method,formId){
    $('#'+formId).submit(e=>e.preventDefault());

    let data = $('#'+formId).serialize();
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            $('.error').html('');

            if(response.status=='success'){

                Swal.fire({
                    position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                        })
        
    
                    
            }
            if(response.status=='error'){
                Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                        })

            }
            $('#'+formId)[0].reset();


        },
        error: function(response){
            console.log(response.responseJSON.errors)
      
            $.each(response.responseJSON.errors, function (key, value) { 
                $('#error-'+key).text(value);
                if(key == 'topic.0'){
                    $('.error-topic').html(value);
                    
                }
              

                 
            });
        }
    });
    
    }


// submit form using serialization end here


    
</script>