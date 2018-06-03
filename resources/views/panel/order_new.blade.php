@extends('panel.layouts.main')

@section('title')
    New Order
@endsection
@section('breadtitle')
    New Order
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>
    <li><a href="{{route('panel/get/allorder')}}">Order List</a></li>
    <li class="active"><strong>new Order</strong></li>
@endsection


@section('content')
    <form action="{{route('panel/add/newOrder')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Order Detail</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Order ID</label>
                                    <input id="title" type="text" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="countries">Country</label>
                                    <select name="c_country" id="c_country" class="form-control">
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                            Republic
                                            of The
                                        </option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                            Islands
                                        </option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                        </option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                            People's
                                            Republic of
                                        </option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic
                                            Republic
                                        </option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                            Yugoslav Republic of
                                        </option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of
                                        </option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                                        </option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                            Grenadines
                                        </option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and
                                            The
                                            South Sandwich Islands
                                        </option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                        </option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor
                                            Outlying
                                            Islands
                                        </option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input id="state" name="c_state" type="text" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="payment">Payment</label>

                                    <input id="payment" type="text" class="form-control" value="created by admin" disabled>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="c_name">Customer name</label>
                                    <input id="c_name" name="c_name" type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input id="city" name="city" type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="zipcode">Zipcode</label>
                                    <input id="zipcode" type="text" name="zipcode" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="initializing">Initializing</option>
                                        <option value="canceled">Canceled</option>
                                        <option value="paid">Paid</option>
                                        <option value="processing">Processing</option>
                                        <option value="ready to deliver">Ready to Deliver</option>
                                        <option value="delivering">Delivering</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Customer Email</label>
                                    <input id="email" name="c_mail" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" name="c_address" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="datetime">Datetime</label>
                                    <input id="datetime" type="text" class="form-control"
                                           value="{{carbon\Carbon::now()->format('Y-m-d H:i:s')}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Order Reciept</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive m-t">
                            <table class="table" id="myTable">
                                <thead style="background: rgba(255,204,0,0.32);">
                                <tr>
                                    <th style="width: 5%;">Item</th>
                                    <th style="width: 15%">Product Name</th>
                                    <th style="width: 5%">Quantity</th>
                                    <th style="width: 10%">Unit Price</th>
                                    <th style="width: 10%">Price</th>
                                    <th style="width: 45%">Product Description (not for client)</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr id="1">
                                    <td>1</td>
                                    <td class="item">
                                        <select id="p_name" name="p_name[0]" class="form-control product">
                                            @foreach($products as $product)
                                                <option value="{{$product->slug}}">{{$product->title}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select id="p_quantity_1" name="p_quantity[0]" class="form-control quantity">
                                            <?php for ($i = 1; $i <= 15; $i++) : ?>
                                            <option value="{{$i}}">{{$i}}</option>
                                            <?php endfor; ?>
                                        </select>
                                    </td>
                                    <td id="p_price_1">{{$products[0]->price}}$</td>
                                    <td id="p_total_price_1">{{$products[0]->price}}$</td>

                                    <td style="font-family: 'MoskNormal';">
                                        <input id="p_description_1" name="item_description[0]" type="text"
                                               class="form-control inp__description" value="">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row m-b">
                                <div class="col-md-1 text-center">
                                    <a id="add_btn"><i class="fa fa-plus" style="font-size: 22px;color: black;"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="title">Order description (for client)</label>
                                        <textarea id="add_product" type="text" name="p_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <table class="table table-borderless" style="background: rgba(255,204,0,0.32);">
                                        <tbody>
                                        <tr>
                                            <td><strong>Total</strong></td>
                                            <td id="end_price">
                                                <strong>$ {{$products[0]->price}}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Taxes</strong></td>
                                            <td id="tax"><strong></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Discount</strong></td>
                                            <td><strong>$ <input type="text" name="discount" id="discount" value="0.00" style="width: 35px"></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Final Price</strong></td>
                                            <td id="final_price">
                                                <strong>$ {{number_format((float)$tax + 10.00,2,'.',',')}}</strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 pull-right text-right">
                                    <button class="btn btn__ btn__save" type="submit">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <!-- Page-Level Scripts -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script>
    <script>
        var quantity = "1";
        var id = 1;

        var end_price = [];
        end_price[0] = 0.00;
        end_price[1] = parseFloat({{$products[0]->price}});
        var tax_perc = parseFloat({{$tax}});

        $(document).ready(function () {
            $('#p_quantity').val(quantity);
            $('#status').val(status);
        
            var final_price = finalPrice(end_price.reduce(getSum),tax_perc);
            $('#final_price strong').text('$ ' + final_price.toFixed(2));

            var tax_price = taxPrice(end_price.reduce(getSum),tax_perc);
            $('#tax strong').text('$ ' + tax_price.toFixed(2));

            $('#add_btn').click(function () {

                id = id + 1;
                end_price[id] = parseFloat({{$products[0]->price}});
                $('#discount').val('0.00');
                $('#end_price strong').text('$ ' + parseFloat(end_price.reduce(getSum)).toFixed(2));

                var final_price = finalPrice(end_price.reduce(getSum),tax_perc);
                $('#final_price strong').text('$ ' + final_price.toFixed(2));

                var tax_price = taxPrice(end_price.reduce(getSum),tax_perc);
                $('#tax strong').text('$ ' + tax_price.toFixed(2));

                $('#myTable tbody').append('' +
                    '<tr id='+id+'>' +
                        '<td>'+id+'</td>' +
                        '<td class="item">' +
                            '<select id="p_name" name="p_name[]" class="form-control product">' +
                                '<option value="zone-global-modem">ZoneFi Global Modem</option>' +
                                '<option value="zonetel-modem">ZoneTel EU Sim</option>' +
                                '<option value="zonefi-global-modem">ZoneFi Global Sim</option>' +
                            '</select>' +
                        '</td>' +
                        '<td>'+
                            '<select id="p_quantity_'+id+'" name="p_quantity[]" class="form-control quantity">'+
                            '<?php for ($i = 1; $i <= 15; $i++) : ?>'+
                            '<option value="{{$i}}">{{$i}}</option>'+
                            '<?php endfor; ?>'+
                            '</select>'+
                        '</td>'+
                        '<td id="p_price_'+id+'">{{$products[0]->price}}$</td>'+
                        '<td id="p_total_price_'+id+'">{{$products[0]->price}}$</td>'+

                        '<td style="font-family: MoskNormal;">'+
                            '<input id="p_description" name="item_description[]" type="text" class="form-control inp__description" value="">'+
                        '</td>'+
                    '</tr>');
            });


            $("body").delegate('.product',"change", function () {

                var name = $(this).val();
                var id = $(this).parent().parent().attr('id');
                $('#p_quantity_'+id).val('1');

                $.ajax({
                    url: "{{route('panel/product/info')}}",
                    type: "POST",
                    data: {
                        name: name,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log( data);
                    },
                    success: function (data) {

                        $('#p_price_'+id).text(data + "$");
                        $('#p_quantity_'+id).val(1);
                        $('#p_total_price_'+id).text(data + "$");
                        end_price[id] = data;
                        $('#discount').val('0.00');
                        $('#end_price strong').text('$ ' + parseFloat(end_price.reduce(getSum)).toFixed(2));

                        var final_price = finalPrice(end_price.reduce(getSum),tax_perc);
                        $('#final_price strong').text('$ ' + final_price.toFixed(2));

                        var tax_price = taxPrice(end_price.reduce(getSum),tax_perc);
                        $('#tax strong').text('$ ' + tax_price.toFixed(2));
                    }

                });

            });


            $("body").delegate('.quantity',"change",function () {

                var quantity = $(this).val();
                var id = $(this).parent().parent().attr('id');
                var txt_price = $('#p_price_'+id).text();
                var price = Number(txt_price.replace("$",""));
                var total_price = quantity * price;
                $('#p_total_price_'+id).text(parseFloat(total_price).toFixed(2)+'$');

                end_price[id] = parseFloat(total_price).toFixed(2);
                $('#discount').val('0.00');
                $('#end_price strong').text('$ ' + parseFloat(end_price.reduce(getSum)).toFixed(2));

                var final_price = finalPrice(end_price.reduce(getSum),tax_perc);
                $('#final_price strong').text('$ ' + final_price.toFixed(2));

                var tax_price = taxPrice(end_price.reduce(getSum),tax_perc);
                $('#tax strong').text('$ ' + tax_price.toFixed(2));

            });

            $("#discount").keydown(function (e) {


                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl/cmd+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+C
                    (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+X
                    (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }

            });

            $('#discount').change(function () {

                var final_price = finalPrice(end_price.reduce(getSum),tax_perc);
                $('#final_price strong').text('$ ' + final_price.toFixed(2));
            });

            $(".metismenu li").removeClass("active");
            $('#order').addClass('active');
        });
        function getSum(total, num) {
          return  parseFloat(total) + parseFloat(num);

        }
        
        function finalPrice(price,tax_perc) {
            var  tax = price * (tax_perc/100);
            var discount = $('#discount').val();
            var  final_price = tax + price - discount;
            return final_price;
        }
        function taxPrice(price,tax_perc) {
            var  tax = price * (tax_perc/100);
            return tax;
        }
        


    </script>
@endsection


