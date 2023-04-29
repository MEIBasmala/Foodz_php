<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/createMenu.css" />
  <title>Foodz</title>
</head>

<body>
  <nav>
    <div class="foodz-icon"></div>
    <div class="nav-writings">
      <div class="home">Home</div>
      <div class="about">About</div>
      <div class="language">
        <div class="earth-icon"></div>
        <div class="language-name">English</div>
      </div>
      <div class="contact-us">Contact Us</div>
    </div>

    <div class="nav-buttons">
      <form action="">
        <button class="login-button">Login</button>
        <button class="join-button">Join</button>
      </form>
    </div>
  </nav>


  <section>
    <div class="menu-creating-title">Create your Restaurant Menu</div>
    <div class="category">
      <div class="category-title">Category 1</div>
      <div class="category-dishes">

        <i class="scroll-left-icon"></i>

        <div class="dishes-list">

          <div class="dish-box">
            <div class="dish-img"></div>
            <div class="dish-name">Dish Name</div>
          </div>
          <a href="../php/addToMenu.html"><img src="../icons/add.png" alt="add-dish" class="add-dish-box" /></a>

        </div>

      </div>
    </div>

    <div class="add-category">
      <a href="../php/addToMenu.html" class="add-category-text"><img src="../icons/add.png" alt="add category"
          class="add-category-icon" />
        add category
      </a>
    </div>
  </section>
</body>

</html>