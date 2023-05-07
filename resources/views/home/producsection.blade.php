<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="text-align:center;margin-bottom:30px;font-weight: 700;line-height: 46px;font-size:40px;font-family: "Nunito Sans", sans-serif;">Ürünlerimiz</h3>
                </div>
            </div>
            <div class="row product__filter">
                @foreach($product as $products)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                            <a href="{{url('product_details',$products->id)}}"><img src="product/{{$products->image}}"></a>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                        <form action="{{url('add_cart',$products->id)}}" method="POST">
                            @csrf
                            <div >
                                <div class="">
                                    <input class="btn btn-light" style="float:right" type="submit" value="Ekle">
                                </div>
                            
                                <div class="">
                                    <input style="width:100px" type="number" name="quantity" autocomplete="off" min="1">
                                </div>
                            </div>
                        </form><br>
                            <h6>{{$products->title}}</h6>
                            @if($products->discount_price!=null)
                            İndirimli fiyatı
                            <br>
                            <h5 style="color:red;">${{$products->discount_price}}</h5>
                            Fiyat
                            <br>
                            <h5 style="text-decoration:line-through">${{$products->price}}</h5> 
                            @else
                            Fiyat
                            <br>
                            <h5>${{$products->price}}</h5> 
                            @endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>