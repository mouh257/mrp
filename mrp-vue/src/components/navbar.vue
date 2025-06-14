<template>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MRP</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" >
      <span class="navbar-toggler-icon">Span</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">



        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reception
          </a>
          <ul class="dropdown-menu" >
              <li><router-link to="/reception" class="dropdown-item">Réception</router-link></li>
            <li><hr class="dropdown-divider"></li>
              <li><router-link to="/ecart" class="dropdown-item">Ecarts</router-link></li>
          </ul>
        </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Production
              </a>
              <ul class="dropdown-menu" >
                  <li><router-link to="/commande" class="dropdown-item">Commande</router-link></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><router-link to="/colisage" class="dropdown-item">Colisage</router-link></li>
                  <li><router-link to="/commande" class="dropdown-item">Palette</router-link></li>
                  <li><router-link to="/commande" class="dropdown-item">Départ</router-link></li>
              </ul>
          </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Paramétres
          </a>
          <ul class="dropdown-menu" >
            <li><router-link to="/producteur" class="dropdown-item">Producteur</router-link></li>
            <li><router-link to="/ferme" class="dropdown-item">Ferme</router-link></li>
            <li><router-link to="/culture" class="dropdown-item">Culture</router-link></li>
            <li><router-link to="/variete"  class="dropdown-item" >Variété</router-link></li>
            <li><router-link to="/serre"  class="dropdown-item" >Serre</router-link></li>
            <li><hr class="dropdown-divider"></li>
            <li><router-link to="/produitfini" class="dropdown-item">Produit fini</router-link></li>
            <li><router-link to="/coloration" class="dropdown-item">Coloration</router-link></li>
            <li><router-link to="/calibre"  class="dropdown-item" >Calibre</router-link></li>
            <li><hr class="dropdown-divider"></li>
            <li><router-link to="/groupedarticle" class="dropdown-item">Groupe d'artcile</router-link></li>
            <li><router-link to="/article" class="dropdown-item">Article d'emballage</router-link></li>
            <li><router-link to="/fournisseur"  class="dropdown-item" >Fournisseur</router-link></li>
          </ul>
        </li>


      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  </template>

  <script>

  </script>

  <style></style>
