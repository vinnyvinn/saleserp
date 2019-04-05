@extends('layouts.app')

@section('page-title', 'Quotations')
@section('page-heading', 'Quotations')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-6">
                   
                    <div class="form-group">
                            <label for="">Choose who to create Quotation for (Lead or Customer)</label>
                            <select name="type" id="myselection" class="form-control">
                                    <option>--None--</option>
                                <option value="New Business">Lead</option>
                                <option value="Existing Business">Customer</option>
                            </select>
                        </div>
                        <div id="showaccount" class="showaccount form-group">
                            <label for="">Choose Customer Account below</label>
                            <select name="account_id" id="" class="form-control" data-live-search="true">
                                <option>--None--</option>
                                @foreach ($accounts as $item)
                                <option  data-tokens="{{ $item->id }}">{{ $item->account_name }}</option>
                                  
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Quotation Date</label>
                                        <div class="input-group mb-3">
                                                <input type="text" class="form-control datepicker" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar-alt"></i></span>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Date Due</label>
                                        <div class="input-group mb-3">
                                                <input type="text" class="form-control datepicker" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar-alt"></i></span>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Currency</label>
                                <select name="currency" id="" class="form-control">
                                    <option value="Kes">Kenya Shillings</option>
                                    <option value="Usd">Us Dollar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Assigned Sales Agent</label>
                                    <select name="assigned_agent" id="" class="form-control">
                                        <option>--None--</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Quotation Number</label>
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">{{ settings('app_qpref') }}</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Quotation Number" aria-label="Username" aria-describedby="basic-addon1" value="{{ $nextquotationNumber }}">
                                      </div>
                            </div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body">
                <div class="row clearfix">
                        <div class="col-md-12">
                          <table class="table items" id="tab_logic">
                            <thead>
                              <tr >
                                <th class="text-left"> # </th>
                                <th class="text-left"> Services </th>
                                <th class="text-left"> Qty </th>
                                <th class="text-left"> Price </th>
                                <th class="text-left"> Total </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='addr0' class="main">
                                <td>1</td>
                                <td><select class="form-control services" name='product[]'>
                                        @foreach ($service as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach    
                                </select></td>
                                <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
                                <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                              </tr>
                              <tr id='addr1'></tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row clearfix">
                        <div class="col-md-2 offset-md-10">
                          <button id="add_row" class="btn btn-info pull-left"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button id='delete_row' class="pull-right btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>
                      </div>
                      <div class="row clearfix" style="margin-top:20px">
                        <div class="col-md-5 offset-md-7">
                          <table class="table" id="tab_logic_total">
                            <tbody>
                              <tr>
                                <th class="text-center">Sub Total</th>
                                <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                              </tr>
                              <tr>
                                <th class="text-center">Tax</th>
                                <td class="text-center">
                                   
                                  <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="0" id="tax">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                      </div>
                                </td>
                              </tr>
                              <tr>
                                <th class="text-center">Tax Amount</th>
                                <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                              </tr>
                              <tr>
                                <th class="text-center">Grand Total</th>
                                <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                     
        </div>
         <div class="card card-body bottom-transaction" style="margin-bottom:100px">
                        <div class="form-group">
                            <label for="">Customer's Note</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="30" style="margin-top: 0px; margin-bottom: 0px; height: 97px;"></textarea>
                                                  </div>
               
    </div> 
    <div class="btn-bottom-toolbar">
            <div class="row">
                    <div class="col-md-2 offset-md-10">
                        <button type="submit" class="btn-info btn btn-block">Save</button>
                    </div>
                </div>
</div> 
    </div>
</div>
@stop

@section('javascript')
<script>

$(document).ready(function(){
	
	// option_list('addr0');
	
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
		// option_list('addr'+i);
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	// $(".services").on('change',function(){
	//     option_checker(this)
	// });
	
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});

});

// function option_checker(id)
// {
// 	var myOption=$(id).val();
// 	var s =0;
// 	$('#tab_logic tbody tr select').each(function(index, element){
//          var myselect = $(this).val();
// 		if(myselect==myOption){
// 			s += 1;
// 		}
//     });
// 	if(s>1){
// 		alert(myOption+' as been added already try new..')	
// 	}
// }

// function option_list(id)
// {
// 	el='#'+id;
// 	var myArray = [{{ $service }}];
// 	var collect = '<option value="">Select Services</option>';
//     for(var i = 0; i<myArray.length;i++){
//         collect += '<option value="'+myArray[i]+'">'+myArray[i]+'</option>';
//     }
//     $(el+" select").html(collect);
// }

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}
</script>    
@endsection