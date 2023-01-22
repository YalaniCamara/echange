<script type="text/javascript">

    $('#register').on('submit',function(event){
        event.preventDefault();

        $.ajax({
            url      : "{{ route('users.register') }}",
            type     : "POST",
            data:{
                "_token"          : "{{ csrf_token() }}",
                name              : $('#name').val(),
                email             : $('#email').val(),
                password          : $('#password').val(),
                confirm_password  : $('#confirm_password').val(),
            }, success:function(response){
                console.log(response)

                if(response.status==true){

                    Swal.fire({
                        icon  : 'success',
                        title : "Enregitrement!",
                        text  :  response.message,
                        timer : 1500,
                        showConfirmButton: false,
                    }).then(function(result) {
                        if (result.dismiss === "timer") {
                            location.reload();
                        }
                    })

                }else if(response.status==false){

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    })

                }
            },error: function (response) {
                console.log(response)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Erreur s'est produit lors de l'enregistrement du formulaire !!!",
                })
            }
              
        });
    });
</script>