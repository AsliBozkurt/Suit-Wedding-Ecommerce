<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Luwen</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="home/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/style.css" type="text/css">

    <style>
        .center{
            margin:auto;
            width:70%;
            margin-top:10px;
            margin-bottom:100px;
            padding:30px;
            text-align:center;
        }

        table,th,td {
            border:1px solid black;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
   @include('home.header')
    <!-- Header Section End -->
    
    <div class="container">
        <div class="row">
            <div class="center">
                <table>
                    <tr  style="background-color:#dad0ff;padding:10px;font-size:25px">
                        <th>Ürün Başlık</th>
                        <th>Miktar</th>
                        <th>Fiyat</th>
                        <th>Ödeme Durumu</th>
                        <th>Teslimat Durumu</th>
                        <th>Image</th>
                        <th>Ürünü İptal Et</th>
                    </tr>

                    @foreach($order as $order)
                    <tr>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img heigth="100" width="100" src="product/{{$order->image}}">
                        </td>

                        
                        <td>
                        @if($order->delivery_status=='processing')
                            <a style="background-color:#ff485f" class="btn btn-light" onclick="return confirm('Ürünü İptal etmek istiyor musun?')" href="{{url('cancel_order',$order->id)}}">İptal Et</a>
                            @else
                        <p>Not Allowed</p>
                        @endif
                        </td>
                       
                    </tr>
                    @endforeach
                </table>
           
            </div>
        </div>
    </div>      

    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    @include('home.search')
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/jquery.nice-select.min.js"></script>
    <script src="home/js/jquery.nicescroll.min.js"></script>
    <script src="home/js/jquery.magnific-popup.min.js"></script>
    <script src="home/js/jquery.countdown.min.js"></script>
    <script src="home/js/jquery.slicknav.js"></script>
    <script src="home/js/mixitup.min.js"></script>
    <script src="home/js/owl.carousel.min.js"></script>
    <script src="home/js/main.js"></script>
</body>

</html>