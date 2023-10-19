<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Fruit Shop</title>

  </head>
  <body>
    <?php
      $uri = service('uri');
     ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (session()->get('isLoggedIn')): ?>
            <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                <a class="nav-link"  href="/dashboard"></a>
            </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/logout"></a>
            </li>
            </ul>
            <?php endif; ?>
      </div>
      </div>
    </nav>
