<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Admin</title>
    
    @include('admin.css')

    <style>
        .title_deg{
            text-align:center;
            font-size:25px;
            font-weight:Bold;
            margin-top:20px;
            padding-bottom:40px;
        }
        
        .table_deg{
          border:1px solid black;
          width:80%;
          margin:auto;
          text-align:center;

        }
        th{
          background-color:#dad0ff;
        }

       
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('admin.navbar')
      <!-- partial -->
      
 @include('admin.sidebar')
        
        <!-- partial -->
        
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        
        <!-- main-panel ends -->
      
        <div class="main-panel">
          <div class="content-wrapper">

          <!-- @if(session('message'))
              <div class="alert alert-dark " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  {{ session('message') }}
              </div>
          @endif -->
                <h2 class="title_deg">Tüm Siparişler</h2>

                <div style="margin-left:400px;padding-bottom:40px;">
                  <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" name="search" PlaceHolder="..." autocomplete="off">
                    <input style="background-color:#dad0ff;" type="submit" value="search" class="btn btn-light">
                  </form>
                </div>
                  <table class="table_deg">

                    <tr>
                      <th>Ad</th>
                      <th>E-mail</th>
                      <th>Adres</th>
                      <th>Telefon</th>
                      <th>Ürün Ad</th>
                      <th>Miktar</th>
                      <th>Fiyat</th>
                      <th>Ödeme Durumu</th>
                      <th>Teslimat Durumu</th>
                      <th>Image</th>
                      <th>Telim Edilmiş</th>
                    </tr>

                    @forelse($order as $order)
                    <tr>
                      <td>{{$order->name}}</td>
                      <td>{{$order->email}}</td>
                      <td>{{$order->address}}</td>
                      <td>{{$order->phone}}</td>
                      <td>{{$order->product_title}}</td>
                      <td>{{$order->quantity}}</td>
                      <td>{{$order->price}}</td>
                      <td>{{$order->payment_status}}</td>
                      <td>{{$order->delivery_status}}</td>
                     
                      <td>
                        <img src="/product/{{$order->image}}">
                      </td>
                        <td><a class="btn btn-primary"  href="{{ url('/delivered/'.$order->id.'/processing') }}">Processing</a></td>
                        <td> <a class="btn btn-info" href="{{ url('/delivered/'.$order->id.'/shipped') }}">Shipped</a></td>
                        <td><a class="btn btn-success"  href="{{ url('/delivered/'.$order->id.'/delivered') }}">Delivered</a></td>
                        <td><a class="btn btn-danger"  href="{{ url('/delivered/'.$order->id.'/cancel') }}">Cancel Order</a></td>
                      <td>

                        @if($order->delivery_status=='processing'||$order->delivery_status=='pending')
                        <a style="background-color:#dad0ff;" onclick="return confirm('Ürünün teslim edildiğinden emin misin?')" href="{{url('delivered',$order->id)}}" class="btn btn-light">Teslim Edilmiş</a>

                        @else
                          <p>Teslim Edilmiş</p>

                        @endif
                      </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="16">Veri Bulunamadı</td>
                    </tr>
                    @endforelse
                  </table>
            </div>

        </div>

      </div>
      <!-- partial:partials/_footer.html -->
      @include('admin.footer')
          <!-- partial -->

    <!-- container-scroller -->
  @include('admin.script')
  </body>
</html>