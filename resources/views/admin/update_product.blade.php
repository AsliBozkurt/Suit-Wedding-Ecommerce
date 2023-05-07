<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <base href="/public">
   @include('admin.css')

   <style>
    label{
        display:inline-block;
        width:200px;
    }

    .div-design{
        padding-bottom:15px;
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
     @include('admin.navbar')
      <!-- partial -->
      
 @include('admin.sidebar')
        
        <!-- partial -->
        
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        
        <!-- main-panel ends -->
      
      <!-- page-body-wrapper ends -->
      <div class="main-panel">
          <div class="content-wrapper">

          @if(session('message'))
              <div class="alert alert-dark " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  {{ session('message') }}
              </div>
          @endif

            <div style="text-align:center;padding-top:40px">
                <h2 style="font-size:40px;padding-bottom:40px;">Ürün Güncelle</h2>

                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div-design">
                <label>Ürün Başlık :</label>
                <input style="padding-bottom:15px" type="text" name="title" placeholder="Write a title" value="{{$product->title}}" autocomplete="off" required="">
                </div>

                <div class="div-design">
                <label>Ürün Açıklama :</label>
                <input style="padding-bottom:15px" type="text" name="description" placeholder="Write a description" value="{{$product->description}}" autocomplete="off" required="">
                </div>

                <div class="div-design">
                <label>Ürün Fiyat :</label>
                <input style="padding-bottom:15px" type="number" name="price" placeholder="Write a price" value="{{$product->price}}" autocomplete="off" required="">
                </div>

                <div class="div-design">
                <label>İndirimli Fiyat :</label>
                <input style="padding-bottom:15px" type="number" name="discount" placeholder="Write a discount is apply" value="{{$product->discount_price}}" autocomplete="off" >
                </div>

                <div class="div-design">
                <label>Ürün Miktarı :</label>
                <input style="padding-bottom:15px" type="number" name="quantity" min="0" placeholder="Write a quantity" value="{{$product->quantity}}" autocomplete="off" required="">
                </div>

                <div class="div-design">
                <label>Ürün Kategorisi :</label>
                <select style="padding-bottom:15px;" name="catagory" required="">
                    <option value="{{$product->catagory}}" selected="">{{$product->title}}</option>

                    
                    @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach

                   
                </select>
                </div>

                <div class="div-design">
                <label>Mevcut Ürün Fotoğrafı :</label>
                <img style="margin:auto" heigth="100" width="100" name="image" src="/product/{{$product->image}}">
                </div>

                
                <div class="div-design">
                <label>Image Güncelleme :</label>
                <input style="padding-bottom:15px" type="file" name="image">
                </div>

                <div class="div-design">
                <input style="background-color:#dad0ff" type="submit" value="Update Product" class="btn btn-light">
                </div>
                
                </form>
                
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