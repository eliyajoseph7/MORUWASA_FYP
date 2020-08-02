<div class="row invoice">
         @foreach($invoice -> all() as  $invoices)
            @if($invoices->category == 'kiosk')
            <?php 
            
                $ewura = $invoices->amount / 100;
                $total = $invoices->amount + $ewura;

                
            ?>
                <div class="col-sm-6 mb-3 pb-3 bg-light">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>From:</h5>
                                <address>
                                    <strong>MORUWASA</strong><br>
                                    P.O.BOX 5476,<br>
                                    Morogoro<br>
                                    <abbr title="Phone">P:</abbr> (123) 601-4590
                                </address>
                            </div>

                            <div class="col-sm-6 text-right">
                                <h4>Invoice No.</h4>
                                <h4 class="text-navy">INV-000567F7-00</h4>
                                <span>To:</span>
                                <address>
                                    <strong>{{( $invoices -> name)}}</strong><br>
                                    {{( $invoices -> street)}}<br>
                                    Meter.No, {{( $invoices -> meter -> meter_no)}}<br>
                                    <abbr title="Phone">P:</abbr> {{( $invoices -> phone)}}
                                </address>
                                <p>
                                    <span><strong>Invoice Date:</strong> <?php echo date('d,M-Y') ?></span><br>
                                    <span><strong>Control.No:</strong>
                                        @if($invoices -> control != null)
                                            @if(count(($invoices -> control)->toArray()) > 0)
                                                {{( $invoices -> control -> control_no )}}
                                            @endif
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="table-responsive m-t">
                            <table class="table invoice-table">
                                <thead>
                                <tr>
                                    <th>Item List</th>
                                    <th>Quantity(units)</th>
                                    <th>Amount(Tsh)</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                        <td><div><strong>Water consumed</strong></div>
                                        <td>{{( $invoices -> units)}}</td>
                                        <td>{{( $invoices -> amount)}}</td>
                                    </tr>
                                    <tr>
                                        <td><div><strong>EWURA</strong></div>
                                        </td>
                                        <td>1%</td>
                                        <td>{{( $ewura)}}</td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->

                        <table class="table invoice-total">
                            <tbody>
                                <!-- <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>$1026.00</td>
                                </tr>
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>$235.98</td>
                                </tr> -->
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>Tsh.{{( $total )}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button id="printInvoice" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                        </div>

                        <div class="well m-t"><strong>Comments</strong>
                             make sure you pay for your bill on time. By moruwasa &copy; <?php echo date ('Y'); ?>  
                        </div>
                    </div>
                </div>
            @endif 
        @endforeach 
    </div>
