<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="admin/assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Aslı Bozkurt</span>
                  <span class="text-secondary text-small">Founder</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/redirect')}}">
                <span class="menu-title">Kontrol Paneli</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Ürünler</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Ürün Ekle</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Ürün Göster</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_catagory')}}">
                <span class="menu-title">Kategori</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('order')}}">
                <span class="menu-title">Sipariş</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>