@extends('constants.headerAndSide')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10 top">
            <h2></h2>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Bill Invoices</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="text-right">
        <button id="printInvoice" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
       
    </div>

                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-domestic"> Domestic</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-industry">Industry</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-institution">Institution</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-commercial">Commercial</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-tank">Tank</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-kiosk">Kiosk</a></li>
                        </ul>
                        @if(count($invoice) > 0)

                        <div class="tab-content">
                            <div role="tabpanel" id="tab-domestic" class="tab-pane active">
                                <div class="panel-body">
                                @include('customerType.domestic')
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-industry" class="tab-pane">
                                <div class="panel-body">
                                @include('customerType.industry')
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-institution" class="tab-pane">
                                <div class="panel-body">
                                @include('customerType.institution')
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-commercial" class="tab-pane">
                                <div class="panel-body">
                                @include('customerType.commercial')
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-tank" class="tab-pane">
                                <div class="panel-body">
                                @include('customerType.tank')
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-kiosk" class="tab-pane">
                                <div class="panel-body">
                                @include('customerType.kiosk')
                                </div>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>

            



<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });

</script>                

<style>

@media print {
    .nav.nav-tabs li:not(.active){
        display: none;
    }
    .invoice{
    	padding: 10px 20px;
    }
    .theme-config, #printInvoice, li a{
        display: none;
    }

    .invoice{
		background-position: center center;
		background-repeat: no-repeat;

	}
	.table-responsive table{
		background-color: transparent !important;
	}

}
</style>

@endsection