@include('constants.headerAndSide')

@if(count($invoice) > 0)
 <?php   
    function randomNumber($length) {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    } 
?>

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


                    </div>
                </div>

@endif            



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