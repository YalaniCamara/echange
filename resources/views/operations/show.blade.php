@extends('layouts.app')
@section('content')


<div class="card mb-3">
    <div class="card-body bg-black">
      <div class="row justify-content-between align-items-center">
        <div class="col-md">
            <h5 class="mb-2 mb-md-0 text-white">
                <span class="fas fa-exchange-alt mr-2" data-fa-transform="rotate-90"></span> 
                Détails de la transaction
            </h5>
            <div class="position-absolute r-0 t-0 mr-3 z-index-1">
                <a class="nav-link text-white" href="{{ route('operations.index') }}">Retour</a>
            </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
     <div class="col-md-6">
        <div class="card mb-3 mb-lg-0">
            <div class="card-body bg-light">
                <div class="position-relative rounded border bg-white p-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-black">{{ Str::upper($transaction["currencies"]) }}</label><br>
                            <label style="font-size: 12px;" >{{number_format($transaction["value"], 8, ',', ' ')}}  {{strtoupper($transaction["currencies"])}} à {{number_format($transaction["value_usd_cfa"], 2, ',', ' ')}} F/$</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-black">Montant à payer</label><br>
                            <label style="font-size: 12px;" >{{number_format($transaction["value_cfa"], 2, ',', ' ')}} FCFA</label>
                        </div>

                        <div class="col-sm-6">
                            <label class="text-black">Nom du client</label><br>
                            <label style="font-size: 12px;">{{$transaction["name_customers"]}}</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-black">Moyen de paiement</label><br>
                            <label style="font-size: 12px;" >{{$transaction["payement_mode"]}}</label>
                        </div>

                        <div class="col-sm-6">
                            <label class="text-black">Paiement autorisé par</label><br>
                            <label style="font-size: 12px;">{{$transaction["payement_auth_by"]}}</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-black">Paiement reçu le</label><br>
                            <label style="font-size: 12px;" >{{$transaction["block_timestamp"]}}</label>
                        </div>

                        <div class="col-12">
                            <label class="text-black">Paiement éffectué par : </label>
                            <label style="font-size: 12px;" >{{$transaction["payement_validate_by"]}}</label>
                        </div>
                        <div class="col-12">
                            <label for="field-options">Observation</label>
                            <textarea class="form-control form-control-sm bg-white" id="field-options"rows="3" readonly>{{$transaction["observations"]}}</textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-falcon-primary btn-sm mt-2 "  type="submit" id="submitAutoriserPaiement">
                    <span class="fas fa-check fs--2 mr-1" data-fa-transform="up-1"></span>
                    Autoriser le paiement
                </button>
                <button class="btn btn-falcon-default btn-sm mt-2 ml-2" type="submit" id="submitClientValider">
                    <span class="fas fa-check fs--2 mr-1" data-fa-transform="up-1"></span>
                    Paiement du client validé
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3 mb-lg-0">
            <div class="card-header">
                <h5 class="mb-0">Informations complémentaire sur la transaction</h5>
            </div>
            <div class="card-body bg-light">
                <div class="position-relative rounded border bg-white p-3">
                    <div class="row">
                        <input class="form-control form-control-sm" id="id_transactions" type="number" value="{{ $transaction['id'] }}" hidden>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name_customers">Nom du client</label>
                                <input class="form-control form-control-sm" id="name_customers" type="text" placeholder="Nom du client">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="value_cfa_agent">Montant</label>
                                <input class="form-control form-control-sm" id="value_cfa_agent" type="number" placeholder="0.000000000">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payement_mode">Mode de paiement</label>
                                <input class="form-control form-control-sm" id="payement_mode" type="text" placeholder="Mode de paiement">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="observation">Observation</label>
                            <textarea class="form-control form-control-sm" id="observation" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-falcon-warning btn-sm mt-2" style="width: 150px;" id="submitValider" type="submit">
                    <span class="fas fa-check fs--2 mr-1" data-fa-transform="up-1"></span>
                    Valider
                </button>

            </div>
        </div>
    </div>
</div>

@endsection