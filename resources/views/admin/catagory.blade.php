<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    
    @include('admin.css')
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
      
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session('message'))
              <div class="alert alert-dark " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                  {{ session('message') }}
              </div>
          @endif

                    <div style="text-align:center;padding-top:40px;">
                        <h2 style="font-size:40px;padding-bottom:40px;">Kategori Ekle</h2>
                    </div>

                    <form action="{{url('/add_catagory')}}" method="POST" style="text-align:center">

                        @csrf
                        <input type="text" name="catagory" placeholder="Write catagory name" autocomplete="off">
                        <input style="background-color:#dad0ff" type="submit" class="btn btn-light" name="submit" value="Ekle">
                    </form>

                    <table style="margin:auto;text-align:center;width:50%;margin-top:30px;border:1px solid black;">
                      <tr  style="background-color:#dad0ff">
                        <td>Kategori Adı</td>
                        <td>İşlem</td>
                      </tr>

                      @foreach($data as $data)
                      <tr>
                        <td>{{$data->catagory_name}}</td>
                        <td>
                          <a style="background-color:#ff485f" onclick="return confirm('Silmeyi onaylıyor musun')" class="btn btn-light" href="{{url('delete_catagory',$data->id)}}">Sil</a>
                        </td>
                      </tr>
                      @endforeach

                    </table>

            </div>

          </div>

      
      <!-- partial:partials/_footer.html -->
      @include('admin.footer')
          <!-- partial -->

    <!-- container-scroller -->
  @include('admin.script')
  </body>
</html>