class Header extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
      this.innerHTML = `

<style>
.buscador{
  margin-right: 30px;
}

.nav-item:hover{
  text-decoration:underline;
}
</style>

<div id="topheader">
<nav class="navbar navbar-default">
  <div class="container-fluid">
     <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
     </div>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#home">home<span class="sr-only">(current)</span></a></li>
          <li><a href="#page1">page 1</a></li>
          <li><a href="#page2">page 2</a></li>
          <li><a href="#page3">page 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
        </ul>
     </div>
  </div>
</nav>
</div>

      `;
    }
  }
  
  customElements.define('header-component', Header);