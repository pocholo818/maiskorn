@extends('layouts.app')

@section('content')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> <!-- for boxicons -->
<div class="container">

  <div class="row align-items-center">
    <div class="col">
    <div style="background-color:#ffc107" class="card">
                <div class="card-body">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEMAAABDCAYAAADHyrhzAAAAAXNSR0IArs4c6QAAAfRJREFUeF7tmdFRwzAQRHcrgBaoADoAKoAWqABKCZUAFUA6SDqgA0gFYm5iOyYjjW40cmxlVr8+n+WnXUvnIzQGAhSLAwHBGKmhCEYIYQXgusuzJfkSU5g3binqLIXxBeC2e4k1ybsEDFecYCyFgNcmIYQbABeReZtN7JqNDYCoTQB44nYkLcfsI2qTEMIlgDcAUflPMOt3AE8kfyfI7U6ZgmEr+uzOUifwNfUhrpM+nyUF4weAqeOU45vk1SkfePysFIwwx6RIFu1utebqgbEFMJWXTX39eQUtwLgnaeeF6iOEYB/ozz6xYAjGXgtNK+N48oW+GWwnGIBgjFR0NjBsK+xrkkKXYNMfu5u2Senbp+4TjBGZpmF01exwYoytOMm1V0Gtw/h3YkzAcNcXgnFGNpEyVKgd5KyqNXZi9O4S3rimP6Del/TGCca57CbeFffGSRlSRlwrLSrDWn9T/h0ffgks9YewtfsevN6vFPdB8rFSrqI0qb6JrZa1B2JN56IHZW7aWV937gZ0ssLsynXrrhuYqVqNZj+z4WruprMtlrvcnkIOS8spGKMVEQzBiBtUypAypIzs5iWbyCayiWySJSCbyCZZkWg3kU1kE9kkS0A2kU2yItFuIpvIJrJJloBsIptkRaLdRDaRTWSTLAHZJI7oD6+SOlO8mbd1AAAAAElFTkSuQmCC"/>
                <h1>Number of products</h1>
                        <div role="alert">
                                <?php
                                        $countProducts = DB::table('products')->count();
                                        echo $countProducts;
                                ?>
                        </div>
                </div>
            </div>
    </div>
    <div class="col">
    <div style="background-color:#20c997" class="card">
                <div class="card-body">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEMAAABDCAYAAADHyrhzAAAAAXNSR0IArs4c6QAAAXdJREFUeF7tmOFNwzAQRu/bgA1gBDaAbsAmMAIjwCbdoLABI9AN2OAqC5U6ktNzVKtHq5fflu28fM93sYznj4BgcSAAjCoNwABG+3CYJMPdP8zsIfkc+ZT0mLEHYMxpQjIqMsAARrvpIhnTZLyZ2X3GSV6t+SXpJWMPNF1R0+Xum5QvI60y1t2v2UyGu3vGpiSlJhUYHZqQjD0kNJmWWJJBMhplo0OTlaTyu9/9uHv5LT9asi+1mgCjigEw6v8HM/vpduR34E3033Opmizk0DccGHUHSDt+oEEySEb7DCEZJINkhPX1v2rybWa34e7HDthKuhs75bLZ5m66yi3587KpTh79nnUrHt2Bltb51cyezpCQrZmty3qSlrb4J3+BeoLUC9ihbzJgMmDUpX0A0KuZgmSQjJmm72oyPuBF0ARN0CQUCU3QBE3QJCSAJmgShoRqgiZogiYhATRBkzAkVBM0QRM0CQmgCZqEIaGaoAmaoElIAE3aiHa1B5FEaGRD+gAAAABJRU5ErkJggg=="/>
                <h1>Total orders today</h1>
                        <div role="alert">
                                <?php
                                        $countOrder = DB::table('orders')->count();
                                        echo $countOrder;
                                ?>
                        </div>
                </div>
            </div>
    </div>
    <div class="col">
    <div style="background-color:#6f42c1" class="card">
                <div class="card-body">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEMAAABDCAYAAADHyrhzAAAAAXNSR0IArs4c6QAAAmBJREFUeF7tWdFRGzEU3FcBdECoAKggpAJMBUAFmEqSVACuAFNBQgUkFQAd4AoeszM68iKkUzLGc3ee1Z/t8+lptft2dWfQeEPAhMUfBARGYIPAEBjl5iBm9DHD3Q8B7AzUWFdm9mugufEXM9z9HMD1UMWkeS/M7GaIGnIwlgBOhigkzHlnZrMhasjB+Ang8xCFhDnvzex4iBr+F4zvZjZfp1B3/wbgsucekwFjbT3/Q1+aBBjPAA7N7GVNZuwCoGPsVe4zejBWAI5rtpfsmL2GtszBxXJRRZtM17M/lSx8tGD8Tgublxjh7tzlrwBoyaVBi7zq+S/7BwE8GHsD7d2hBMSPwIaaesiOL33ycvfoYqNkRgsM7vpZhsB9+pzb88LMauzBpMFImn8IQFBOMzN74nfu/gkAA1yk/373e06hqYPBrMFe0Y13C02APIZr2DvYI96NqYMRJVKVU7bIamATGIEfUwdDMuk2s9BAaZ+nWQO9zWx3OxtocoyStTIvcOSnzu211gQG0ycXH+2zZBa0XUb56plmCj2jO2NQAq1InYevDpQFgFaUZxzvzjT83ygTaNxl7iojde3gxZDFp1PxoLbsCVm8jlGe7MrH6MFgwUyXRx90hGd6JYClMQkwWLge7oTt02O/Cp039fVoZKJXBSFZ6iVS5Hs6etc6/aak0d33qWbHm56Y99eL54CywBAYZdGJGWKGmNE0JMlEMpFMJJMmApKJZNIkidxEMpFMJJMmApKJZNIkidxEMpFMJJMmApKJZNIkidxEMpFMJJMmApKJZNIkidxEMpFMmjJ5BQ7nZlP+ieYFAAAAAElFTkSuQmCC"/>
                <h1>Sales today</h1>
                        <div role="alert">
                                <?php
                                        $salesTotal = DB::table('orders')->get()->sum('total_price');
                                
                                        echo "₱".$salesTotal;
                                ?>
                        </div>
                </div>
            </div>
    </div>
  </div><br>

  <!--  -->
</div>
@endsection
