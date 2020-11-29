<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
require_once('../../controller/user/userController.php');
include_once('header.php'); ?>
       
<div class="container">
    <h1>Tools</h1>
    <div class="row">
        
        <div id="box" class="col">
            <div class="text-center">
                <h2>Currency Converter</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-group field">
                            <input class="form-field" id="fromAmount" placeholder="Input"  type="text" size="15" onkeyup="currencyConverter();">
                            <label for="fromamount" class="form-label">Input</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group field">
                            <select class="form-field" id="from" onchange="currencyConverter();">
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
                            <label for="firstCurrency" class="form-label">First Currency</label>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group field">
                            <input class="form-field" placeholder="Answer" id="toAmount" type="text" size="15" disabled>
                            <label for="toamount" class="form-label">Answer</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group field">
                            <select class="form-field" id="to" onchange="currencyConverter();">
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
                            <label for="secondCurrency" class="form-label">Second Currency</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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