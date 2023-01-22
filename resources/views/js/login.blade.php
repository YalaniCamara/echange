<script type="text/javascript">

    $('#login').on('submit',function(event){
        event.preventDefault();

        console.log($('#connexion_email').val())
        console.log($('#connexion_password').val())
        $.ajax({
            url      : "{{ route('users.connect') }}",
            type     : "POST",
            data:{
                "_token"          : "{{ csrf_token() }}",
                email             : $('#connexion_email').val(),
                password          : $('#connexion_password').val(),
            }, success:function(response){
                console.log(response)

                if(response.status == true){

                    window.location.reload();

                }else if(response.status == false){

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