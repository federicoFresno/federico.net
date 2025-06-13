<div class="navbar-fixed">
  <nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo"><img class="responsive-img" src="img/logo-white.png"></a>
      <ul class="right hide-on-med-and-down">
        <a class="btn" href="/get-started">Get Started</a>
        <li ng-class="{'active':services.indexOf(page)!=-1}"><a href='/services' class="dropdown-button" data-activates='svc_dd'>Services</a></li>
        <ul id='svc_dd' class='dropdown-content'>
          <li>
            <a href="/it-solutions"><img src="img/icons/menu-icons/it.png" class="xs-icon"><span class="menu-text">IT Solutions</span></a>
          </li>
          <li>
            <a href="/phone-systems"><img src="img/icons/menu-icons/telecom.png" class="xs-icon"><span class="menu-text">Phone Systems</span></a>
          </li>
          <li>
            <a href="/managed-services"><img src="img/icons/menu-icons/total-care.png" class="xs-icon"><span class="menu-text">Managed IT Services</span></a>
          </li>
          <li>
            <a href="/business-continuity"><img src="img/icons/menu-icons/business-cont.png" class="xs-icon"><span class="menu-text">Business Continuity</span></a>
          </li>
          <li>
            <a href="/backup"><img src="img/icons/menu-icons/backup.png" class="xs-icon"><span class="menu-text">Backup Solutions</span></a>
          </li>
          <li>
            <a href="/case-study"><img src="img/icons/menu-icons/case-study.png" class="xs-icon"><span class="menu-text">Case Study</span></a>
          </li>
        </ul>
        <li ng-class="{'active':page=='about'}"><a href="/about">About</a></li>
        <li ng-class="{'active':page=='support'}"><a href="/support">Support</a></li>
        <li ng-class="{'active':page=='contact'}"><a href="/contact">Contact</a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav blue-grey darken-3">
        <li><a href="/services">Services</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/support">Support</a></li>
        <li><a href="/contact">Contact</a></li>
        <a class="btn teal darken-2 white-text" href="/get-started">Get Started</a>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons lg-m-icon">menu</i></a>
    </div>
  </nav>
</div>
