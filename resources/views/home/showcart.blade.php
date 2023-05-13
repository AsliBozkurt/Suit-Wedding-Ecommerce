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
            margin-left:40px;
            width:50%;
            margin-top:10px;
            margin-bottom:100px;
            padding:30px;
            text-align:center;
        }

        table,th,td{
            border:1px solid black;
        }
        .image_deg{
            height:150px;
            width:150px;
        }

        .total_deg{
            font-size:30px;
            padding: 40px;
            family-font:bold;
          
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

    @if(session('message'))
              <div class="alert alert-dark " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  {{ session('message') }}
              </div>
          @endif
    
    <div class="container">
        <div class="row">
            <div class="center">
                <table>
                <tr style="background-color:#dad0ff;padding:10px;font-size:25px">
                    <th>Ürün Başlık</th>
                    <th>Ürün Miktar</th>
                    <th>Fiyat</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
        <?php $totalprice=0; ?>
            @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>${{$cart->price}}</td>
                    <td><img class="image_deg" src="/product/{{$cart->image}}"></td>
                    <td> <a style="background-color:#ff485f" class="btn btn-light" href="{{url('/remove_cart',$cart->id)}}" onclick="return confirm('Emin misiniz?')">Çıkart</a></td>
                </tr>
        <?php $totalprice=$totalprice + $cart ->price; ?>
            @endforeach   
                <div> 
                    <h3 class="total_deg">Toplam Fiyat: ${{$totalprice}}</h3>
                </div>

            </table>
           
        </div>
                <div style="margin-right:210px;margin-top:50px;">
                    <h3 style="text-align:center;font-size:15px;">Siparişe devam et</h3>
                    <a style="margin:10px;padding:10px;" href="{{url('cash_order')}}" class="btn btn-light">Kapıda Ödeme</a>
                    <a style="margin:10px;padding:10px;" href="{{url('stripe',$totalprice)}}" class="btn btn-light">Kart ile Ödeme</a>
                </div>
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