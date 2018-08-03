<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="./dashboard" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/logo-rasengan.png">
          </div>
        </a>
        <a href="/dashboard" class="simple-text logo-normal">
          Rio's Library
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="@if($title=='Dashboard') active @endif ">
            <a href="./dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="@if($title=='Genres') active @endif">
            <a href="./genres">
              <i class="nc-icon nc-tag-content"></i>
              <p>Genres</p>
            </a>
          </li>
          <li class="@if($title=='Authors') active @endif">
            <a href="./authors">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Authors</p>
            </a>
          </li>
          <li class="@if($title=='Library Sections') active @endif">
            <a href="./sections">
              <i class="nc-icon nc-tile-56"></i>
              <p>Library Sections</p>
            </a>
          </li>
          <li class="@if($title=='Books') active @endif">
            <a href="./books">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Books</p>
            </a>
          </li>
          <li class="@if($title=='Book Issues') active @endif">
            <a href="./issues">
              <i class="nc-icon nc-box-2"></i>
              <p>Book Issues</p>
            </a>
          </li>
          <li class="@if($title=='Registered Members') active @endif">
            <a href="./members">
              <i class="nc-icon nc-badge"></i>
              <p>Registered Members</p>
            </a>
          </li>
          {{-- <li class="active-pro">
            <a href="./settings">
              <i class="nc-icon nc-spaceship"></i>
              <p>SETTINGS</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>