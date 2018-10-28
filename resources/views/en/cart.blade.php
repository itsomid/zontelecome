@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | Cart
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class="main-body fifth-color bg__enjoy">

        <section class="flex-container-main  justify-content-center sec__padding  pt-0">
            <div class="container text-center text-lg-left">
                <div class="row mb-md-3">
                    <p class="cart_title_1">1. Check your shopping list:</p>
                </div>
                @if(empty($products))
                    <p class="cart_title_1">Your Shopping Cart is empty.</p>
                @else
                    @foreach($products as $key=>$item)
                        <div id="omid" class="row align-items-center cart_item mb-3">
                            <a class="remove_product" id="{{$item[0]->slug}}"><i class="fa fa-times cart_item_remove"></i></a>
                            <div class="cart_item_img">
                                <img src="{{$item[0]->main_image_url}}" >
                            </div>
                            <div class="cart_item_text mt-4">
                                <h2 class="mb-0">{{$item[0]->title}}</h2>

                                <span>$ {{number_format($item[0]->price,2)}}</span>
                            </div>
                            <div class="cart_item_price text-right mt-4">
                                <div class="row justify-content-end mb-3">
                            <span class="mr-2 pt-1">
                                <a class="cart_item_ar add_item" id="{{$item[0]->slug}}">Add <i class="fa fa-plus"></i></a>
                                <a class="cart_item_ar remove_item" id="{{$item[0]->slug}}">Remove <i class="fa fa-minus"></i></a>
                            </span>
                                    <span id="p_slug_{{$key}}" class="cart_item_number mb-4">x{{count($item)}}</span>
                                </div>
                                <div class="row justify-content-end">
                                    <h3 id="product_price_{{$key}}" class="product_price">$ {{number_format($item[0]->price*count($item),2)}} </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row cart_item num_price mt-2">
                        <div class="col-md-4 text-center align-self-center">
                            <span class="fa fa-check tick_icon"></span>
                            <span id="total_item">
                                Number of items:
                                <strong>
                                    @if(!empty(session('cart.item')))
                                    {{count(session('cart.item'))}}
                                        @endif
                                </strong>
                               </span>
                        </div>
                        <div class="col-md-3 align-self-end mt-5">
                            <div class="table-responsive m-t">
                                <table class="table invoice-table table-borderless cart_item_table">

                                    <tbody>
                                    <tr>
                                        <td>
                                            <div>Total</div>
                                        </td>
                                        <td id="total_price">$26.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Taxes</div>
                                        </td>
                                        <td id="tax"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Shipment</div>
                                        </td>
                                        <td>${{number_format($setting->delivery_fee,2)}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Discount</div>
                                        </td>
                                        <td id="dis">${{number_format($setting->discount,2)}}</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5 second-color cart_item_final">
                            <div class="mt-3 mt-md-0">
                                <span class="mr-3">Final Price</span>
                                <span  id="final_price">$ 19.19</span>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </section>
        <section class="sec__padding sec__bg">
            <div class="container text-center text-lg-left">
                <div class="row">
                    <p class="cart_title_2">2. Enter your information:</p>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <form action="{{route('website/product/payment/create')}}" method="POST" class="d-flex flex-wrap">
                            {{csrf_field()}}
                            <div class="col-md-7">

                                <div class="form-group row">
                                    <label for="txt_name" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="c_name" name="c_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txt_email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="c_mail" name="c_mail" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="c_address" name="c_address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="c_city" name="c_city" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_country" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
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
                                </div>
                                <div class="form-group row">
                                    <label for="c_state" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="c_state" name="c_state" required>
                                    </div>
                                    <label for="c_zipcode" class="col-sm-2 col-form-label text-center text-md-right pr-0 pl-0">Zip Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="c_zipcode" name="c_zipcode" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 align-self-end mt-3 mt-md-0 text-center text-md-right">
                                @if(!empty($products))
                                    <span class="payment__text">Secrue payment by <strong>Squareup</strong></span>
                                    <button class="btn btn__product mb-md-5">Check Out<i class="fa fa-caret-right" style="padding-left: 15px"></i></button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function () {
            var sum = 0;
            var tax_perc = parseFloat({{$setting->tax_fee}});
            $('.product_price').each(function(){
                sum += parseFloat($(this).text().replace('$ ',''));
            });
            var tax = taxPrice(sum,tax_perc);
            $('#tax').text("$" + tax.toFixed(2));
            $('#total_price').text("$"+sum.toFixed(2));

            var discount = discountPrice(sum);
            $('#dis').text("$ "+discount.toFixed(2));


            var final_price =finalPrice(sum,tax_perc);
            $('#final_price').text("$ "+final_price.toFixed(2));




            $('.remove_product').click(function () {
                var product_slug = $(this).attr('id');

                $.ajax({
                   url: "{{route('website/remove/product')}}",
                    type: "POST",
                    data:{
                       slug: product_slug,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {
                        location.reload();
                    }
                  
                });
            });
            $('.add_item').click(function () {
                var product_slug = $(this).attr('id');

                $.ajax({

                    url: "{{route('website/add/product/item')}}",
                    type: "POST",
                    data:{
                        slug: product_slug,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log("error" + data);
                    },
                    success: function (data) {

                        $('#p_slug_' + product_slug).text("x" + data['product_count']);
                        $('.nav-item span').text(data['total_count']);
                        $('#total_item').text("Number of items: " + data['total_count']);
                        $('#product_price_' + product_slug).text("$ "+data['total_price'].toFixed(2));
                        var sum = 0;
                        $('.product_price').each(function(){
                           sum += parseFloat($(this).text().replace('$ ',''));
                        });
                        $('#total_price').text("$"+sum.toFixed(2));
                        var tax = taxPrice(sum,tax_perc);
                        $('#tax').text("$" + tax.toFixed(2));
                        var final_price =finalPrice(sum,tax_perc);
                        $('#final_price').text("$ "+final_price.toFixed(2));
                    }

                });
            });
            $('.remove_item').click(function () {

                var product_slug = $(this).attr('id');
                var product_count = $('#p_slug_'+product_slug).text().replace('x','');
                product_count = parseInt(product_count);
                if (product_count > 1) {
                    $.ajax({

                        url: "{{route('website/remove/product/item')}}",
                        type: "POST",
                        data: {
                            slug: product_slug,
                            _token: "{{ csrf_token() }}"
                        },
                        error: function (data) {
                            console.log("error" + data);
                        },
                        success: function (data) {
                            console.log(data);

                            $('#p_slug_' + product_slug).text("x" + data['product_count']);
                            $('.nav-item span').text(data['total_count']);
                            $('#total_item').text("Number of items: " + data['total_count']);
                            $('#product_price_' + product_slug).text("$ "+data['total_price'].toFixed(2));
                            var sum = 0;
                            $('.product_price').each(function(){
                                sum += parseFloat($(this).text().replace('$ ',''));
                            });
                            $('#total_price').text("$"+sum.toFixed(2));
                            var tax = taxPrice(sum,tax_perc);
                            $('#tax').text("$" + tax.toFixed(2));

                            var final_price =finalPrice(sum,tax_perc);
                            $('#final_price').text("$ "+final_price.toFixed(2));
                        }
                    });
                }
                else {
                    console.log("minimum number");
                }

            });

        });
        function finalPrice(price,tax_perc) {
            var delivery = parseFloat({{$setting->delivery_fee}});
            var discount = discountPrice(price);
            var  tax = price * (tax_perc/100);
            var  final_price = tax + price + delivery - discount;
            return final_price;
        }
        function taxPrice(price,tax_perc) {
            var  tax = price * (tax_perc/100);
            return tax;
        }
        function discountPrice(price) {
            var discount_perc = parseFloat({{$setting->discount}});
            var  discount = price * (discount_perc/100);
            return discount;
        }
    </script>
@endsection

