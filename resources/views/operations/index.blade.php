@extends('layouts.app')
@section('content')

<div class="card-deck">
  <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
    <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-1.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
      <h6>
        USDT > Prix Grosiste rachat
        {{-- <span class="badge badge-soft-warning rounded-capsule ml-2">-0.23%</span> --}}
      </h6>
      <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning">
        {{number_format($pricings['price_usdt'], 1, ',', ' ')}} FCFA
      </div>
      <a class="font-weight-semi-bold fs--1 text-nowrap">
        Prix ​​USDT : {{number_format($pricings['price_usdt_market'], 1, ',', ' ')}} $
      </a>
    </div>
  </div>
  <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
    <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-2.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
      <h6>
        BTC > Prix Grosiste rachat
        {{-- <span class="badge badge-soft-info rounded-capsule ml-2">0.0%</span> --}}
      </h6>
      <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info">
        {{number_format($pricings['price_btc'], 1, ',', ' ')}} FCFA
      </div>
      <a class="font-weight-semi-bold fs--1 text-nowrap">
        Prix BTC : {{number_format($pricings['price_btc_market'], 3, ',', ' ')}} $
      </a>
    </div>
  </div>
  <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
    <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
    </div>
    <!--/.bg-holder-->

    
    <div class="card-body position-relative">
      <h6>
        FCFA > Montant à payer
        {{-- <span class="badge badge-soft-success rounded-capsule ml-2">9.54%</span> --}}
      </h6>
      <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif">
        {{number_format(0, 1, ',', ' ')}} FCFA
      </div>
        <a class="font-weight-semi-bold fs--1 text-nowrap">
          Valeur : {{number_format(0, 3, ',', ' ')}} $
        </a>
    </div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col">
        <span class="fas fa-exchange-alt mr-2" data-fa-transform="rotate-90"></span> 
        <strong>Liste des transactions</strong>
      </div>
    </div>
  </div>
  <div class="card-body bg-light px-0">
    <div class="row">
      <div class="col-12">
        <table class="table table-sm table-dashboard data-table no-wrap mt-2 fs--1 w-100 ">
          <thead class="bg-200">
            <tr>
              <th class="sort">Date</th>
              <th class="sort">Type</th>
              <th class="sort">Crypto</th>
              <th class="sort">Quantité</th>
              <th class="sort">Montant FCFA</th>
              <th class="sort">Client</th>
              <th class="sort">Status</th>
              <th class="sort"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transactions as $transaction)
                 <tr>
                    <td>{{  date('d/m/Y H:i:s', $transaction["block_timestamp"])}}</td>
                    <td>{{$transaction["operations"]}}</td>
                    <td>
                      {{-- <img src="{{ asset('img/'.$transaction["currencies"].'coin.png')}}"> --}}

                      {{strtoupper($transaction["currencies"])}}
                      {{-- <span class="name">({{$transaction["currencies_name"]}})</span> --}}
                    </td>
                    <td>{{number_format($transaction["value"], 8, ',', ' ')}}</td>
                    <td>{{number_format($transaction["value_cfa"], 2, ',',' ')}}</td>
                    <td>{{$transaction["name_customers"]}}</td>
                    <td><span class="badge bg-success">{{$transaction["status"]}}</span></td>
                    <td>
                        <a href="{{ route('operations.show', ['id' => $transaction['id']]) }}" class="btn btn-outline-info btn-sm">Détails</a>
                    </td>
                </tr> 
            @endforeach
          </tbody>
          <tfoot class="bg-200">
            <tr>
              <th class="sort">Date</th>
              <th class="sort">Type</th>
              <th class="sort">Crypto</th>
              <th class="sort">Quantité</th>
              <th class="sort">Montant FCFA</th>
              <th class="sort">Client</th>
              <th class="sort">Status</th>
              <th class="sort"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

</div>



@endsection

@section('scripts')
@parent

@endsection