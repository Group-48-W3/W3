<?php 
session_start();
require_once('../../controller/user/userController.php');
include_once('header.php'); ?>
       
<div class="container">
    <h1>Tools</h1>
    <div class="row">
        <div class="col">
            <div class="text-center">
                <h2>Calculator</h2>
            </div>
            <div class="form-group field">
                <input type="text" name="writespace" readonly class="form-field" id="writespace" placeholder="Input">
                <label class="form-label" for="writespace">Input</label>
            </div>
            <div class="right">
                <small class="form-text text-muted">Result : </small><small id="past-val">0</small>
            </div>
            <div class="form-group field">
                <input type="text" value="0" name="printspace" class="form-field" readonly id="printspace" placeholder="Answer">
                <label class="form-label" for="printspace">Answer</label>
            </div>
            <div class="container">
                <table style="width:100%">
                    <tr>
                        <td><button class="btn btn-outline-light w-100">1</button></td>
                        <td><button class="btn btn-outline-light w-100">2</button></td>
                        <td><button class="btn btn-outline-light w-100">3</button></td>
                        <td>
                            <div class="btn-group w-100">
                                <button class="btn btn-outline-info w-100">+</button>
                                <button class="btn btn-outline-info w-100">-</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-outline-light w-100">4</button></td>
                        <td><button class="btn btn-outline-light w-100">5</button></td>
                        <td><button class="btn btn-outline-light w-100">6</button></td>
                        <td>
                            <div class="btn-group w-100">
                                <button class="btn btn-outline-info w-100">x</button>
                                <button class="btn btn-outline-info w-100">/</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-outline-light w-100">7</button></td>
                        <td><button class="btn btn-outline-light w-100">8</button></td>
                        <td><button class="btn btn-outline-light w-100">9</button></td>
                        <td>
                            <div class="btn-group w-100">
                                <button class="btn btn-outline-info w-100">(</button>
                                <button class="btn btn-outline-info w-100">)</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-outline-light w-100">0</button></td>
                        <td><button class="btn btn-outline-danger w-100" >C</button></td>
                        <td>
                            <button class="btn btn-outline-success w-100">=</button>
                        </td>
                        <td>
                            <div class="btn-group w-100">
                                <button class="btn btn-outline-info w-100" >^</button>
                                <button class="btn btn-outline-info w-100" >Ans</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="box">
    <h2>Currency Converter</h2>
    <table>
        <tr>
            <td><input id="fromAmount" type="text" size="15" value="0" onkeyup="currencyConverter();"></td>
            <td>
                <select id="from" onchange="currencyConverter();">
                    <option value="AUD">Australian Dollar (AUD)</option>
                    <option value="BDT">Bangladesh Taka (BDT)</option>
                    <option value="CAD">Canadian Dollar (CAD)</option>
                    <option value="CNY">Chinese Yuan (CNY)</option>
                    <option value="EGP">Egyptian Pound (EGP)</option>
                    <option value="EUR">EURO (EUR)</option>
                    <option value="HKD">Hong Kong Dollar (HKD)</option>
                    <option value="INR">Indian Rupee (INR)</option>
                    <option value="ILS">Israeli Sheqel (ILS)</option>
                    <option value="JPY">Japanese Yen (JPY)</option>
                    <option value="MYR">Malaysian Ringgit (MYR)</option>
                    <option value="MVR">Maldives Rufiyaa (MVR)</option>
                    <option value="NZD">New Zealand Dollar  (NZD)</option>
                    <option value="PKR">Pakistan Rupee (PKR)</option>
                    <option value="PHP">Philippine Peso (PHP)</option>
                    <option value="QAR">Qatari Rial (QAR)</option>
                    <option value="RUB">Russian Ruble (RUB)</option>
                    <option value="SAR">Saudi Riyal (SAR)</option>
                    <option value="SGD">Singapore Dollar (SGD)</option>
                    <option value="LKR">Sri Lanka Rupee (LKR)</option>
                    <option value="THB">Thailand Baht (THB)</option>
                    <option value="AED">UAE Dirham (AED)</option>
                    <option value="GBP">Pound Sterling (GBP)</option>
                    <option value="USD" selected>US Dollar (USD)</option>
                </select>
            </td>
        </tr>
            
        <tr>
        <td><input id="toAmount" type="text" size="15" disabled></td>
            <td>
                <select id="to" onchange="currencyConverter();">
                    <option value="AUD">Australian Dollar (AUD)</option>
                    <option value="BDT">Bangladesh Taka (BDT)</option>
                    <option value="CAD">Canadian Dollar (CAD)</option>
                    <option value="CNY">Chinese Yuan (CNY)</option>
                    <option value="EGP">Egyptian Pound (EGP)</option>
                    <option value="EUR">EURO (EUR)</option>
                    <option value="HKD">Hong Kong Dollar (HKD)</option>
                    <option value="INR">Indian Rupee (INR)</option>
                    <option value="ILS">Israeli Sheqel (ILS)</option>
                    <option value="JPY">Japanese Yen (JPY)</option>
                    <option value="MYR">Malaysian Ringgit (MYR)</option>
                    <option value="MVR">Maldives Rufiyaa (MVR)</option>
                    <option value="NZD">New Zealand Dollar  (NZD)</option>
                    <option value="PKR">Pakistan Rupee (PKR)</option>
                    <option value="PHP">Philippine Peso (PHP)</option>
                    <option value="QAR">Qatari Rial (QAR)</option>
                    <option value="RUB">Russian Ruble (RUB)</option>
                    <option value="SAR">Saudi Riyal (SAR)</option>
                    <option value="SGD">Singapore Dollar (SGD)</option>
                    <option value="LKR" selected>Sri Lanka Rupee (LKR)</option>
                    <option value="THB">Thailand Baht (THB)</option>
                    <option value="AED">UAE Dirham (AED)</option>
                    <option value="GBP">Pound Sterling (GBP)</option>
                    <option value="USD">US Dollar (USD)</option>
                </select>
            </td>
        </tr>
    </table>
</div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

<script>
    var current_val, collector;
    $(function(ready){
        $("input#writespace").on("change",function(){
            $("input#writespace").val(eval($("input#writespace").val()));
        });
    })

    $("button").click(function(){
        current_val = $(this).html();

        if(current_val == "Ans"){
            current_val = collector;
        }

        if(current_val=="C"){
            $("input#writespace").val("");
        }
        else if(current_val == "^"){
            $("input#writespace").val($("input#writespace").val() + "**");
        }
        else if(current_val == "x"){
            $("input#writespace").val($("input#writespace").val() + "*");
        }
        else if(current_val=="="){
            $("input#printspace").val(eval($("input#writespace").val()));
        }
        else{
            $("input#writespace").val($("input#writespace").val() + current_val);
        }

        if(current_val in "1234567890)".split("")){
            $("input#printspace").val(eval($("input#writespace").val()));
            collector = $("input#printspace").val();
            $("#past-val").html($("input#writespace").val());
        }

        

    });
</script>

<script>
    function currencyConverter()
    {
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
        var xmlhttp = new XMLHttpRequest();
        var url = "http://data.fixer.io/api/latest?access_key=2eac199252266bc77836add81d4d2967&format=1?" + from + "," + to;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function()
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var result = xmlhttp.responseText;
                //alert(result);
                var jsResult = JSON.parse(result);
                var oneUnit = jsResult.rates[to]/jsResult.rates[from];
                var amt = document.getElementById("fromAmount").value;
                document.getElementById("toAmount").value = (oneUnit * amt).toFixed(2);

            }
        }
    }
    </script>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	