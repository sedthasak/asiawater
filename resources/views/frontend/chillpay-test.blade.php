<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" id="form1" action="https://sandbox-cdnv3.chillpay.co/Payment/">
        <input type="hidden" name="MerchantCode" id="MerchantCode">
        <input type="hidden" name="OrderNo" id="OrderNo">
        <input type="hidden" name="CustomerId" id="CustomerId">
        <input type="hidden" name="Amount" id="Amount">
        {{-- <input type="hidden" name="PhoneNumber" value="0888889999"> --}}
        {{-- <input type="hidden" name="Description" value="Test Payment"> --}}
        <input type="hidden" name="ChannelCode" id="ChannelCode">
        <input type="hidden" name="Currency" id="Currency">
        <input type="hidden" name="LangCode" id="LangCode">
        <input type="hidden" name="RouteNo" id="RouteNo">
        <input type="hidden" name="IPAddress" id="IPAddress">
        <input type="hidden" name="ApiKey" id="ApiKey">
        {{-- <input type="hidden" name="TokenFlag" value="N"> --}}
        {{-- <input type="hidden" name="CreditToken" value=""> --}}
        {{-- <input type="hidden" name="CreditMonth" value="6"> --}}
        {{-- <input type="hidden" name="ShopID" value=""> --}}
        {{-- <input type="hidden" name="ProductImageUrl" value=""> --}}
        {{-- <input type="hidden" name="CustEmail" value=""> --}}
        {{-- <input type="hidden" name="CardType" value=""> --}}
        <input type="hidden" name="CheckSum" id="CheckSum">
        <input type="submit" name="submit">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-md5@0.7.3/build/md5.min.js"></script>
    <script>
        var MerchantCode = 'M035190';
        // var OrderNo = '202407041238';// $.now();
        function padZero(num, length) {
            return num.toString().padStart(length, '0');
        }

        var now = new Date();
        var year = now.getFullYear();
        var month = padZero(now.getMonth() + 1, 2);
        var day = padZero(now.getDate(), 2);
        var hour = padZero(now.getHours(), 2);
        var minute = padZero(now.getMinutes(), 2);

        var OrderNo = year + month + day + hour + minute;
        var CustomerId = 'CUS000001';
        var Amount = 2000; // 100 = 1.00
        var ChannelCode = 'bank_qrcode';
        var Currency = '764';
        var LangCode = 'TH';
        var RouteNo = 1;
        var IPAddress;
        var ApiKey = 'opqCqCgVZXAeDO8IJmQeMUetKk1BJQPEXKN7oqe4VVa2ka0CgHlmQqd4KCWxoNSN';
        var CheckSum;
        var MD5Key = '0TJp06H8S9vPrR4yNHkHL8QiPC7Oks9QQ4T4ANouilYxnzwhtd41BnRRV7O5MYb6iAlhMJoGn2ttMONpBNzZRLtpp4qrssTQZJLYHHys1je0hrIDmEpx9SkTDmrJG9yXUi6c2zFIFkKzfMpBxHEaQtKnMufjpr4OFQoFD';
        $( document ).ready(async function() {
            const response = await fetch('https://api.ipify.org?format=json');
            const data = await response.json();
            IPAddress = data.ip;
            CheckSum = md5(MerchantCode+OrderNo+CustomerId+Amount+ChannelCode+Currency+LangCode+RouteNo+IPAddress+ApiKey+MD5Key);
            $('#MerchantCode').val(MerchantCode);
            $('#OrderNo').val(OrderNo);
            $('#CustomerId').val(CustomerId);
            $('#Amount').val(Amount);
            $('#ChannelCode').val(ChannelCode);
            $('#Currency').val(Currency);
            $('#LangCode').val(LangCode);
            $('#RouteNo').val(RouteNo);
            $('#IPAddress').val(IPAddress);
            $('#ApiKey').val(ApiKey);
            $('#CheckSum').val(CheckSum);
        });
    </script>
</body>
</html>