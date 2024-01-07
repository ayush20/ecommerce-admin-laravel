<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8"> <!-- utf-8 works for most cases -->
<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
<meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
<!-- CSS Reset : BEGIN -->
<style>
html,
body {
margin: 0 auto !important;
padding: 0 !important;
height: 100% !important;
width: 100% !important;
background: #fff;
}

/* What it does: Stops email clients resizing small text. */
* {
-ms-text-size-adjust: 100%;
-webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
mso-table-lspace: 0pt !important;
mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
border-spacing: 0 !important;
border-collapse: collapse !important;
table-layout: fixed !important;
margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
-ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
border-bottom: 0 !important;
cursor: default !important;
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
display: none !important;
opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
color: inherit !important;
}

/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size you'd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
u ~ div .email-container {
min-width: 320px !important;
}
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
u ~ div .email-container {
min-width: 375px !important;
}
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
u ~ div .email-container {
min-width: 414px !important;
}
}
</style>
<!-- CSS Reset : END -->
<!-- Progressive Enhancements : BEGIN -->
<style>

.primary{
background: #f3a333;
}

.bg_white{
background: #ffffff;
}
.bg_light{
background: #fafafa;
}
.bg_black{
background: #000000;
}
.bg_dark{
background: rgba(0,0,0,.8);
}
.email-section{
padding:2.5em;
}

/*BUTTON*/
.btn{
padding: 10px 15px;
}
.btn.btn-primary{
border-radius: 30px;
background: #f3a333;
color: #ffffff;
}



h1,h2,h3,h4,h5,h6{
font-family: 'Playfair Display', serif;
color: #000000;
margin-top: 0;
}

body{
font-family: 'Montserrat', sans-serif;
font-weight: 400;
font-size: 15px;
line-height: 1.8;
color: rgba(0,0,0,.4);
}

a{
color: #f3a333;
}

table{
}
.hero{
position: relative;
}
.hero img{

}
.hero .text{
color: #000;
}
.hero .text h2{
color: #000;
font-size: 30px;
margin-bottom: 0;
}
.hero .text h3{
color: #000;
font-size: 20px;
margin-bottom: 0;
}


/*HEADING SECTION*/
.heading-section{
}
.heading-section h2{
color: #000000;
font-size: 28px;
margin-top: 0;
line-height: 1.4;
}
.heading-section .subheading{
margin-bottom: 20px !important;
display: inline-block;
font-size: 13px;
text-transform: uppercase;
letter-spacing: 2px;
color: rgba(0,0,0,.4);
position: relative;
}
.heading-section .subheading::after{
position: absolute;
left: 0;
right: 0;
bottom: -10px;
content: '';
width: 100%;
height: 2px;
background: #f3a333;
margin: 0 auto;
}

.heading-section-white{
color: rgba(255,255,255,.8);
}
.heading-section-white h2{
font-size: 28px;
font-family: 
line-height: 1;
padding-bottom: 0;
}
.heading-section-white h2{
color: #000;
}
.heading-section-white h3{
color: #000;
}
.heading-section-white .subheading{
margin-bottom: 0;
display: inline-block;
font-size: 13px;
text-transform: uppercase;
letter-spacing: 2px;
color: rgba(255,255,255,.4);
}


.icon{
text-align: center;
}
.icon img{
}


/*SERVICES*/
.text-services{
padding: 10px 10px 0; 
text-align: center;
}
.text-services h3{
font-size: 20px;
}

/*BLOG*/
.text-services .meta{
text-transform: uppercase;
font-size: 14px;
}

/*TESTIMONY*/
.text-testimony .name{
margin: 0;
}
.text-testimony .position{
color: rgba(0,0,0,.3);

}


/*VIDEO*/
.img{
width: 100%;
height: auto;
position: relative;
}
.img .icon{
position: absolute;
top: 50%;
left: 0;
right: 0;
bottom: 0;
margin-top: -25px;
}
.img .icon a{
display: block;
width: 60px;
position: absolute;
top: 0;
left: 50%;
margin-left: -25px;
}



/*COUNTER*/
.counter-text{
text-align: center;
}
.counter-text .num{
display: block;
color: #ffffff;
font-size: 34px;
font-weight: 700;
}
.counter-text .name{
display: block;
color: rgba(255,255,255,.9);
font-size: 13px;
}


/*FOOTER*/

.footer{
color: rgba(255,255,255,.5);

}
.footer .heading{
color: #ffffff;
font-size: 20px;
}
.footer ul{
margin: 0;
padding: 0;
}
.footer ul li{
list-style: none;
margin-bottom: 10px;
}
.footer ul li a{
color: rgba(255,255,255,1);
}

.order-table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.order-table td, .order-table th {
  border: 1px solid #000;
  padding: 8px;
}
.order-table th {
  text-align: left;
  background-color: #fff;
  color: 000;
}
@media screen and (max-width: 500px) {

.icon{
text-align: left;
}

.text-services{
padding-left: 0;
padding-right: 20px;
text-align: left;
}

}

</style>
</head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">
<center style="width: 100%;">
<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
</div>
<div style="max-width: 600px; margin: 0 auto;" class="email-container">
<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
<tr>
<td style="padding: 1em 2.5em; text-align: center;background:#fff">
<a href="https://heartswithfingers.com/"><img src="https://heartswithfingers.com/csadmin/public/img/uploads/settings/169219063164dcc7a7a7a4a.png" alt="logo" width="125" height="52"></a>
</td>
</tr>

<tr>
<td valign="middle" class="hero" style="background:#fff;">
<table width="100%">
<tr>
<td style="height:30px;"></td>
</tr>
<tr>
<td>
<div class="text" style="padding: 0 2em;">
  <h2>Order Recived </h2>
  <p>Your Order #{{isset($details['rowTransData'])?$details['rowTransData']['trans_order_number']:''}} is recived </p> 
<p>Dearest {{isset($details['rowTransData'])?$details['rowTransData']['trans_user_name']:''}}</p>
<h3>Thank you for choosing heartswithfingers!</h3>
<p>Our women artisans are very excited to pack your box of ‘handcrafted goodness’ and we will be notifying you with tracking details very soon!</p>
<p>By shopping with us, you’ve just supported a budding women’s enterprise on its journey towards sustainability and joined our growing community of mindful shoppers.</p>
<p>Together, we can build a more ethical and eco-friendly shopping community that makes a difference with every purchase.</p>
<p>With love & gratitude,</p>
<h4>The heartswithfingers team.</h4>
<p>P.S. While you wait, follow us on social media and join our community on Instagram!</p>
<p>View your order</p>
<p>OR </p>
<p>Visit our store</p>
<h3>Order details:</h3>
</div>
</td>
</tr>
<tr>
<td style="height:30px;"></td>
</tr>
<tr>
<td>
<div class="text" style="padding: 0 2em;">
<table class="order-table">
<thead>
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Discount</th>
<th>Total</th>
</tr>
</thead>
<tbody>
@php 
$subTotal = 0;
$total = 0;
$discount = 0;
@endphp
@if(isset($details['rowTransData']['items']) && count($details['rowTransData']['items']))
@foreach($details['rowTransData']['items'] as $value)
@php 
$subTotal += $value->td_item_sellling_price * $value->td_item_qty;
$total += $value->td_item_sellling_price;
$discount += ($value->td_item_net_price - $value->td_item_sellling_price) * $value->td_item_qty;
@endphp
<tr>
<td>{{$value->td_item_title}}</td>
<td>{{$value->td_item_qty}}</td>
<td>₹{{number_format($value->td_item_net_price,2)}}</td>
<td>₹{{number_format($value->td_item_net_price - $value->td_item_sellling_price,2)}}</td>
<td>₹{{number_format($value->td_item_sellling_price * $value->td_item_qty,2)}}</td>
</tr>
@endforeach
<tr>
<td colspan="4">Subtotal:</td>
<td>₹{{number_format($subTotal,2)}}</td>
</tr>
<tr>
<td colspan="4">Coupon Discount:</td>
<td>@php echo (isset($details['rowTransData']['trans_coupon_dis_amt']) && $details['rowTransData']['trans_coupon_dis_amt']>0)?'-₹'.number_format($details['rowTransData']['trans_coupon_dis_amt'],2):'₹0.00';@endphp</td>
</tr>
<tr>
<td colspan="4">Coupon Code:</td>
<td>@php echo (isset($details['rowTransData']['trans_coupon_code']) && $details['rowTransData']['trans_coupon_code']!='')?$details['rowTransData']['trans_coupon_code']:'-';@endphp</td>
</tr>
<tr>
<td colspan="4">Shipping:</td>
<td>@php echo (isset($details['rowTransData']['trans_shipping_amount']) && $details['rowTransData']['trans_shipping_amount']>0)?'₹'.number_format($details['rowTransData']['trans_shipping_amount'],2):'Free';@endphp</td>
</tr>
<tr>
<td colspan="4">Total Amount:</td>
<td>₹{{number_format($details['rowTransData']['trans_amt'],2)}}</td>
</tr>
@endif
</tbody>
</table>
</div>
</td>
</tr>
<tr>
<td style="height:30px;"></td>
</tr>
<td>
<div class="text" style="padding: 0 2em;">
<table class="order-table">
<tr>
<td>
<h3>Shipping & Billing Address</h3>
<p>{{isset($details['rowTransData'])?$details['rowTransData']['trans_delivery_address']:''}}</p>
</td>
</tr>
</table>
</div>
</td>

<tr>
<td style="height:30px;"></td>
</tr>
<tr>
<td>

</td>
</tr>
<tr>
<td style="height:30px;"></td>
</tr>
</table>
</td>
</tr><!-- end tr -->
</table>
</div>
</center>
</body>
</html>