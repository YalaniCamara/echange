<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/lib/@fortawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/lib/stickyfilljs/stickyfill.min.js') }}"></script>
<script src="{{ asset('assets/lib/sticky-kit/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/lib/is_js/is.min.js') }}"></script>
<script src="{{ asset('assets/lib/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/lib/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<script src="{{ asset('assets/lib/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables-bs4/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/lib/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('assets/lib/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('assets/lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{asset('assets/lib/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/lib/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Datatable -->
<script src="{{asset('assets/lib/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lib/datatables-bs4/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lib/datatables.net-responsive/dataTables.responsive.js')}}"></script>
<script src="{{asset('assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js')}}"></script>

<script type="text/javascript">



    $('#submitValider').on('click',function(){

        var id_transactions  = $('#id_transactions').val(),
        name_customers       = $('#name_customers').val(),
        value_cfa_agent      = $('#value_cfa_agent').val(),
        payement_mode        = $('#payement_mode').val();

        if(name_customers == null || name_customers == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Veuillez renseigner le nom du client !!!',
            })
            return ;
        }

        if(value_cfa_agent == null || value_cfa_agent == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Veuillez renseigner le montant !!!',
            })
            return ;
        }

        if(payement_mode == null || payement_mode == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Veuillez renseigner le mode de paiement !!!',
            })
            return ;
        }

        $.ajax({
            url      : "{{ route('operations.update') }}",
            type     : "POST",
            data:{
                "_token"         : "{{ csrf_token() }}",
                id_transactions  : $('#id_transactions').val(),
                value_cfa_agent  : $('#value_cfa_agent').val(),
                name_customers   : $('#name_customers').val(),
                payement_mode    : $('#payement_mode').val(),
            }, success:function(response){
                console.log(response)
                
                if(response.status == true){

                    Swal.fire({
                        icon  : 'success',
                        title : "Modification!",
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

    $('#submitAutoriserPaiement').on('click',function(){

        var id_transactions  = $('#id_transactions').val();

        $.ajax({
            url      : "{{ route('operations.authorization') }}",
            type     : "POST",
            data:{
                "_token"         : "{{ csrf_token() }}",
                id_transactions  : $('#id_transactions').val(),
            }, success:function(response){
                console.log(response)
                
                if(response.status == true){

                    Swal.fire({
                        icon  : 'success',
                        title : "Modification!",
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

    $('#submitClientValider').on('click',function(){

        var id_transactions  = $('#id_transactions').val();

        $.ajax({
            url      : "{{ route('operations.validation') }}",
            type     : "POST",
            data:{
                "_token"         : "{{ csrf_token() }}",
                id_transactions  : $('#id_transactions').val(),
            }, success:function(response){
                console.log(response)
                
                if(response.status == true){

                    Swal.fire({
                        icon  : 'success',
                        title : "Modification!",
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
    
    
    $(function () {

        $("#listeTable").DataTable({
            "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            }
        })


    });
</script>